# Importing the dataset
dataset <- read.csv("heart_disease_male.csv")
# dataset_backup <- dataset

# Data-presprocessing
# dataset$disease = factor(dataset$disease, levels = c("positive", "negative"))
# dataset$disease <- as.numeric(as.character(dataset$disease))
is.factor(dataset$disease)
# converting categorical columns to numeric
dataset$exercice_angina <- ifelse(dataset$exercice_angina=="yes",1,0)
dataset$disease <- ifelse(dataset$disease=="positive",1,0)
dataset$blood_sugar <- ifelse(dataset$blood_sugar=='t',1,0)
# one row of the datset has a '?' at row:64 and col:rest_electro
row_to_keep<-(dataset$rest_electro!='?')
dataset <-dataset[row_to_keep,]
# converting chest_pain col to dummy variables
dataset$cp_asy<-ifelse(dataset$chest_pain=="asympt",1,0)
dataset$cp_asyang<-ifelse(dataset$chest_pain=="atyp_angina",1,0)
dataset$cp_non_anginal<-ifelse(dataset$chest_pain=="non_anginal",1,0)
dataset$cp_typ_angina<-ifelse(dataset$chest_pain=="typ_angina",1,0)
# removing the chest_pain column
dataset = dataset[, -2]
# converting rest_electro colto dummy variables
dataset$rest_electro_left<-ifelse(dataset$rest_electro=="left_vent_hyper",1,0)
dataset$rest_electro_normal<-ifelse(dataset$rest_electro=="normal",1,0)
dataset$rest_electro_st<-ifelse(dataset$rest_electro=="st_t_wave_abnormality",1,0)
# removing the rest_electro column
dataset = dataset[, -4]
# remove overfitting
dataset = dataset[, -13]
dataset = dataset[, -10]
# creating a new dataset to rearrange the columns
dataset_new <-data.frame(dataset$age,dataset$cp_asy,dataset$cp_asyang,dataset$cp_non_anginal,
                         dataset$rest_bpress,dataset$blood_sugar,dataset$rest_electro_left,dataset$rest_electro_normal,
                         dataset$max_heart_rate,dataset$exercice_angina,dataset$disease)
colnames(dataset_new)<-c("age","cp_asy","cp_asyang","cp_non_anginal",
                         "rest_bpress","blood_sugar","rest_electro_left","rest_electro_normal",
                         "max_heart_rate","exercice_angina","disease")

# checking the dataset for factors and anomalies before splitting
# summary(dataset_new)

# Splitting the dataset into the Training set and Test set
# install.packages('caTools')
# library(caTools)
# set.seed(123)
# split <- sample.split(dataset_new$disease, SplitRatio = .8)
# training_set <- subset(dataset_new, split == TRUE) #TEMP
# test_set <- subset(dataset_new, split == FALSE)
# feature scaling
dataset_new[, c(1,5,9)] <- scale(dataset_new[, c(1,5,9)])

# creating a data frame 'prediction data' for adding the user's
# input into the test set for prediction  
# nrt <- nrow(dataset_new)
# prediction_data <-data.frame(age=numeric(),cp_asy=numeric(),cp_asyang=numeric(),
#                              cp_non_anginal=numeric(),rest_bpress=numeric(),blood_sugar=numeric(),
#                              rest_electro_left=numeric(),rest_electro_normal=numeric(),
#                              max_heart_rate=numeric(),exercice_angina=numeric(),disease=factor())
# 
# # appending one row of data from the user to data frame 
# prediction_data <- cbind(age=43,cp_asy=1,cp_asyang=0,cp_non_anginal=0,
#                      rest_bpress=140,blood_sugar=0,rest_electro_left=0,rest_electro_normal=1,
#                      max_heart_rate=135,exercice_angina=1,disease=1)
# # adding this value into the test set
# test_set<-rbind(test_set,prediction_data)
# tsa <- nrow(test_set)
# # deleting the updated row,just in case
# # test_set <- test_set[c(-tsa), ]

# removing the variables not needed anymore
rm(row_to_keep)
# rm(split)
# rm(dataset_backup)
# done with pre_processing

# ALGORITHM BEGINS
# step1: calculate cost(h(x),y) = -log(h(x)) if y=1 or -log(1-h(x)) if y=0
#         this function is taken to make the curve convex
# step2: J(Theta)=1/m * summation(cost) for all rows
# step3: minimize J(Theta)
# once we get theta values,the classifier is ready

# we are creating a new function for log as log(0)=infinity and such a value cannot be handled as numeric
theLog <- function(x){
  if(x==0)  return(-100)
  else  return (log(x))
}

# initialize variables
cost <- 0
alpha <- 6.75

#if you increase alpha beyond this, jtheta will diverge

jThetaPrev <- 100000
jTheta <- 100
difference <- 10
thetaVector <- c(1,1,1,1,1,1,1,1,1,1,1)
nrts <- nrow(dataset_new)
Hvec <-vector(mode= "double" ,length = nrts)

# this while loop helps us to generate the coefficients for the classifier equation
# it take approximately 2-3 minutes to run
# has to be run only once because the training set is static(constant)
# after which the thetaVector can store the value of coefficients

X1vec <- dataset_new[,1]
X2vec <- dataset_new[,2]
X3vec <- dataset_new[,3]
X4vec <- dataset_new[,4]
X5vec <- dataset_new[,5]
X6vec <- dataset_new[,6]
X7vec <- dataset_new[,7]
X8vec <- dataset_new[,8]
X9vec <- dataset_new[,9]
X10vec <- dataset_new[,10]
Yvec <- dataset_new[,11]

while(difference != 0) {
  cost <- 0
  jThetaPrev <- jTheta
  
  
  for (i in 1:nrts){
    
    thetaX <- thetaVector[1] + thetaVector[2]*as.numeric(X1vec[i]) + thetaVector[3]*as.numeric(X2vec[i]) + thetaVector[4]*as.numeric(X3vec[i]) + thetaVector[5]*as.numeric(X4vec[i]) + thetaVector[6]*as.numeric(X5vec[i]) +
      thetaVector[7]*as.numeric(X6vec[i]) +thetaVector[8]*as.numeric(X7vec[i]) + thetaVector[9]*as.numeric(X8vec[i]) + thetaVector[10]*as.numeric(X9vec[i]) + thetaVector[11]*as.numeric(X10vec[i])
    h <- 1/(1+exp(-thetaX))
    Hvec[i] <- h
    cost <- as.numeric(cost - as.numeric(Yvec[i])*theLog(h) - (1-as.numeric(Yvec[i]))*theLog(1-h)) 
  }
  jTheta <- cost / nrts
  
  temp <- (Hvec-Yvec)
  d0Vector <- temp      #this vector has no multiplicand as it is related to the intercept and no column
  d1Vector <- temp*X1vec
  d2Vector <- temp*X2vec
  d3Vector <- temp*X3vec
  d4Vector <- temp*X4vec
  d5Vector <- temp*X5vec
  d6Vector <- temp*X6vec
  d7Vector <- temp*X7vec
  d8Vector <- temp*X8vec
  d9Vector <- temp*X9vec
  d10Vector <- temp*X10vec
  
  d0 <- sum(d0Vector)/nrts
  d1 <- sum(d1Vector)/nrts
  d2 <- sum(d2Vector)/nrts
  d3 <- sum(d3Vector)/nrts
  d4 <- sum(d4Vector)/nrts
  d5 <- sum(d5Vector)/nrts
  d6 <- sum(d6Vector)/nrts
  d7 <- sum(d7Vector)/nrts
  d8 <- sum(d8Vector)/nrts
  d9 <- sum(d9Vector)/nrts
  d10 <- sum(d10Vector)/nrts
  
  thetaVector[1] <- thetaVector[1] - alpha*d0
  thetaVector[2] <- thetaVector[2] - alpha*d1
  thetaVector[3] <- thetaVector[3] - alpha*d2
  thetaVector[4] <- thetaVector[4] - alpha*d3
  thetaVector[5] <- thetaVector[5] - alpha*d4
  thetaVector[6] <- thetaVector[6] - alpha*d5
  thetaVector[7] <- thetaVector[7] - alpha*d6
  thetaVector[8] <- thetaVector[8] - alpha*d7
  thetaVector[9] <- thetaVector[9] - alpha*d8
  thetaVector[10] <- thetaVector[10] - alpha*d9
  thetaVector[11] <- thetaVector[11] -alpha*d10
  difference <- jThetaPrev - jTheta 
  print(paste (jTheta,difference, sep = " "))
}

# Current fitting of the training set for "heart_disease_male.csv" dataset gives theta as
# thetaVector
# 0.38574838 -0.07202112 -0.43727087 -3.15996655 -2.19736352 -0.04694301  1.18733454 -1.29032897 -0.04416490 -0.23220314  2.17574439
# run this line if we are not running the while loop above;ie when there is no change in the dataset
# thetaVector <- c(0.38574838,-0.07202112,-0.43727087,-3.15996655,-2.19736352,-0.04694301,
#                  1.18733454,-1.29032897,-0.04416490,-0.23220314,2.17574439)

# clearing the unwanted variables to free memory
rm(temp);
rm(d0);rm(d1);rm(d2);rm(d3);rm(d4);rm(d5);rm(d6);rm(d7);rm(d8);rm(d9);rm(d10)
rm(difference);rm(jTheta);rm(jThetaPrev);rm(i);rm(alpha);rm(cost);rm(nrts);rm(h);rm(thetaX)
rm(X1vec);rm(X2vec);rm(X3vec);rm(X4vec);rm(X5vec);rm(X6vec);rm(X7vec);rm(X8vec);rm(X9vec);rm(X10vec)
rm(d0Vector);rm(d1Vector);rm(d2Vector);rm(d3Vector);rm(d4Vector);rm(d5Vector);rm(d6Vector);rm(d7Vector);rm(d8Vector);rm(d9Vector);rm(d10Vector)

# converting the hypothesis into yes or no inorder to check how well the equation fits the training set
Hvec <- ifelse(Hvec >= 0.5 , 1 , 0 )      
# first confusion matrix for our algorithm
confMatrix = table(Yvec, Hvec)
confMatrix


# saving the vector in a .txt file
thetaVectorSave <- c(0.38574838,-0.07202112,-0.43727087,-3.15996655,-2.19736352,-0.04694301,1.18733454,-1.29032897,-0.04416490,-0.23220314,2.17574439)
write(thetaVectorSave, file = "cardiology_values.txt",
      ncolumns = if(is.character(thetaVectorSave)) 1 else 11,
      append = FALSE, sep = " ")

# scale_vector <-c(47.932692,8.058679 ,133.629808 ,17.469434 ,137.581731 ,23.934150)
scale_vector <-c(mean(dataset$age) , sd(dataset$age),
                 mean(dataset$rest_bpress) , sd(dataset$rest_bpress),
                 mean(dataset$max_heart_rate) , sd(dataset$max_heart_rate))

write(scale_vector, file = "cardiology_scaling.txt",
      ncolumns = if(is.character(scale_vector)) 1 else 11,
      append = FALSE, sep = " ")

# now that we have found the values of theta,we can use it to for an equation for predicting 
# the condition of the test case
# test_set[, c(1,5,9)] <- scale(test_set[, c(1,5,9)])

# tp_variable1 <-  test_set[1] * thetaVector[2]
# tp_variable2 <-  test_set[2] * thetaVector[3] 
# tp_variable3 <-  test_set[3] * thetaVector[4] 
# tp_variable4 <-  test_set[4] * thetaVector[5] 
# tp_variable5 <-  test_set[5] * thetaVector[6] 
# tp_variable6 <-  test_set[6] * thetaVector[7] 
# tp_variable7 <-  test_set[7] * thetaVector[8] 
# tp_variable8 <-  test_set[8] * thetaVector[9] 
# tp_variable9 <-  test_set[9] * thetaVector[10] 
# tp_variable10 <-  test_set[10] * thetaVector[11] 
# 
# thetaX_test_set <- vector(mode = "double",length = nrow(test_set))
# thetaX_test_set <- thetaVector[1] + tp_variable1[,1] + tp_variable2[,1] + tp_variable3[,1] + 
#                    tp_variable4[,1] + tp_variable5[,1] + tp_variable6[,1] + tp_variable7[,1] +
#                    tp_variable8[,1] + tp_variable9[,1] + tp_variable10[,1]
# hypothesis_sigmoid <- 1/(1+exp(-thetaX_test_set))
# # converting the hypothesis into class values for better prediction
# y_prediction <- ifelse(hypothesis_sigmoid >= 0.5 , 1 , 0 )      
# # first confusion matrix for our algorithm
# confMatrix_test = table(test_set[,11], y_prediction)
# confMatrix_test

# clearing the unwanted variables to free memory
#rm(thetaX_test_set)
#rm(tp_variable1);rm(tp_variable2);rm(tp_variable3);rm(tp_variable4);rm(tp_variable5)
#rm(tp_variable6);rm(tp_variable7);rm(tp_variable8);rm(tp_variable9);rm(tp_variable10)

# # checking the value of the last row of the test set(which is the user value)
#ifelse(y_prediction[tsa]==1,print("You are diagnosed with a heart disease!Please take care."),
 #      print("Your test reports are negative.Thank you!"))

# comparison of various algorithms
# 1. linear classifier
# building the linear classifier
# classifier =glm(formula= disease ~ ., family = binomial,data= training_set)
# prob_pred <-predict(classifier, type = 'response',newdata= test_set[-11])
# # making the confusion matrix
# cm<- table(test_set[, 11] , y_pred)
# cm

# # 2. naive bayes
# # building the naive Bayes classifier
# classifier_b <-naiveBayes(x=training_set[-11],y=training_set$disease)
# # making the confusion matrix
# cm1<- table(test_set[, 11] , y_pred_b)
# cm1

# # 3. SVM
# # building the SVM gaussian classifier
# classifier_s <- svm(formula = disease ~ .,data=training_set,
#                   type='C-classification',kernel='radial')
# # Predicting the Test set results
# y_pred_s = predict(classifier_s, newdata = test_set[-11])
# # Making the Confusion Matrix
# cm2 = table(test_set[, 11], y_pred_s)
# cm2