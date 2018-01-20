dataset_new= read.csv('sick-euthyroid.csv',header = F)

#renaming the columns to dataset_new
dataset<- data.frame(dataset_new$V2,dataset_new$V3,dataset_new$V4,
                     dataset_new$V5,dataset_new$V6,dataset_new$V7,dataset_new$V8,
                     dataset_new$V9,dataset_new$V10,dataset_new$V11,dataset_new$V12,
                     dataset_new$V13,dataset_new$V14,dataset_new$V16,
                     dataset_new$V18,dataset_new$V20,dataset_new$V22,dataset_new$V24,dataset_new$V1)
colnames(dataset)<-c('Age','Gender','on_thyroxine','query_on_thyroxine',
                     'on_antithyroid_medication','thyroid_surgery','query_hypothyroid',
                     'query_hyperthyroid','pregnant','sick','tumor','lithium','goitre',
                     'TSH','T3','TT4','T4U','FTI','Result')


row_to_keep<-(dataset$TSH!='?')
dataset <-dataset[row_to_keep,]
rm(row_to_keep)

row_to_keep<-(dataset$T3!='?')
dataset <-dataset[row_to_keep,]
rm(row_to_keep)

row_to_keep<-(dataset$Gender!='?')
dataset <-dataset[row_to_keep,]
rm(row_to_keep)


dataset$Age=ifelse(is.na(dataset$Age),
                   ave(dataset$Age, FUN = function(x) mean(x, na.rm=TRUE)),
                   dataset$Age)

summary(dataset)

#converting to categorical columns to numeric data
dataset$Male <- ifelse(dataset$Gender=="M",1,0)



#removing Gender column
dataset<-dataset[,-2]
#removing overfitting

dataset$Result<-ifelse(dataset$Result=="negative",0,1)
dataset$on_thyroxine<-ifelse(dataset$on_thyroxine=="f",0,1)
dataset$query_on_thyroxine<-ifelse(dataset$query_on_thyroxine=="f",0,1)
dataset$on_antithyroid_medication<-ifelse(dataset$on_antithyroid_medication=="f",0,1)
dataset$thyroid_surgery<-ifelse(dataset$thyroid_surgery=="f",0,1)
dataset$query_hypothyroid<-ifelse(dataset$query_hypothyroid=="f",0,1)
dataset$query_hyperthyroid<-ifelse(dataset$query_hyperthyroid=="f",0,1)
dataset$pregnant<-ifelse(dataset$pregnant=="f",0,1)
dataset$sick<-ifelse(dataset$sick=="f",0,1)
dataset$tumor<-ifelse(dataset$tumor=="f",0,1)
dataset$lithium<-ifelse(dataset$lithium=="f",0,1)
dataset$goitre<-ifelse(dataset$goitre=="f",0,1)
rm(dataset_new)
dataset<-data.frame(dataset$Age,dataset$Male,dataset$on_thyroxine,dataset$query_on_thyroxine,
                    dataset$on_antithyroid_medication,dataset$thyroid_surgery,dataset$query_hypothyroid,
                    dataset$query_hyperthyroid,dataset$pregnant,dataset$sick,dataset$tumor,dataset$lithium,dataset$goitre,
                    dataset$TSH,dataset$T3,dataset$TT4,dataset$T4U,dataset$FTI,dataset$Result)
colnames(dataset)<-c('Age','Male','on_thyroxine','query_on_thyroxine',
                     'on_antithyroid_medication','thyroid_surgery','query_hypothyroid',
                     'query_hyperthyroid','pregnant','sick','tumor','lithium','goitre',
                     'TSH','T3','TT4','T4U','FTI','Result')
dataset$TSH<-as.numeric(as.character(dataset$TSH))
dataset$T3<-as.numeric(as.character(dataset$T3))
dataset$TT4<-as.numeric(as.character(dataset$TT4))

dataset$T4U<-as.numeric(as.character(dataset$T4U))
dataset$FTI<-as.numeric(as.character(dataset$FTI))

row_to_keep <- !is.na(dataset$TT4)
dataset <-dataset[row_to_keep,]

row_to_keep <- !is.na(dataset$T4U)
dataset <-dataset[row_to_keep,]

row_to_keep <- !is.na(dataset$FTI)
dataset <-dataset[row_to_keep,]

# saving the scaling values befoere scaling
# scale_vector <-c(47.932692,8.058679 ,133.629808 ,17.469434 ,137.581731 ,23.934150)
scale_vector <-c(mean(dataset$Age) , sd(dataset$Age),
                 mean(dataset$TSH) , sd(dataset$TSH),
                 mean(dataset$T3) , sd(dataset$T3),
                 mean(dataset$TT4) , sd(dataset$TT4),
                 mean(dataset$T4U) , sd(dataset$T4U),
                 mean(dataset$FTI) , sd(dataset$FTI))


write(scale_vector, file = "Thyroid_scaling.txt",
      ncolumns = if(is.character(scale_vector)) 1 else 11,
      append = FALSE, sep = " ")


#scaling
dataset[,c(1,14,15,16,17,18)]<-scale(dataset[,c(1,14,15,16,17,18)])

theLog <- function(x){
  if(x==0)  return(-100)
  else  return (log(x))
}

# initialize variables
cost <- 0
alpha <- 15.5

#if you increase alpha beyond this, jtheta will diverge

jThetaPrev <- 100000
jTheta <- 100
difference <- 10
thetaVector <- c(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1)
nrts <- nrow(dataset)
Hvec <-vector(mode= "double" ,length = nrts)

# this while loop helps us to generate the coefficients for the classifier equation
# it take approximately 2-3 minutes to run
# has to be run only once because the training set is static(constant)
# after which the thetaVector can store the value of coefficients

X1vec <- dataset[,1]
X2vec <- dataset[,2]
X3vec <- dataset[,3]
X4vec <- dataset[,4]
X5vec <- dataset[,5]
X6vec <- dataset[,6]
X7vec <- dataset[,7]
X8vec <- dataset[,8]
X9vec <- dataset[,9]
X10vec <- dataset[,10]
X11vec <- dataset[,11]
X12vec <- dataset[,12]
X13vec <- dataset[,13]
X14vec <- dataset[,14]
X15vec <- dataset[,15]
X16vec <- dataset[,16]
X17vec <- dataset[,17]
X18vec <- dataset[,18]
Yvec <- dataset[,19]

while(difference >= 0.0000001) {
  cost <- 0
  jThetaPrev <- jTheta
  
  
  for (i in 1:nrts){
    
    thetaX <- thetaVector[1] + thetaVector[2]*as.numeric(X1vec[i]) + thetaVector[3]*as.numeric(X2vec[i]) + 
      thetaVector[4]*as.numeric(X3vec[i]) + thetaVector[5]*as.numeric(X4vec[i]) + thetaVector[6]*as.numeric(X5vec[i]) +
      thetaVector[7]*as.numeric(X6vec[i]) +thetaVector[8]*as.numeric(X7vec[i]) + thetaVector[9]*as.numeric(X8vec[i]) + thetaVector[10]*as.numeric(X9vec[i]) + thetaVector[11]*as.numeric(X10vec[i])+ thetaVector[12]*as.numeric(X11vec[i]) + thetaVector[13]*as.numeric(X12vec[i]) + 
      thetaVector[14]*as.numeric(X13vec[i]) + thetaVector[15]*as.numeric(X14vec[i]) + thetaVector[16]*as.numeric(X15vec[i]) +
      thetaVector[17]*as.numeric(X16vec[i]) +thetaVector[18]*as.numeric(X17vec[i]) + thetaVector[19]*as.numeric(X18vec[i]) 
   
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
  d11Vector <- temp*X11vec
  d12Vector <- temp*X12vec
  d13Vector <- temp*X13vec
  d14Vector <- temp*X14vec
  d15Vector <- temp*X15vec
  d16Vector <- temp*X16vec
  d17Vector <- temp*X17vec
  d18Vector <- temp*X18vec
  
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
  d11 <- sum(d11Vector)/nrts
  d12 <- sum(d12Vector)/nrts
  d13 <- sum(d13Vector)/nrts
  d14 <- sum(d14Vector)/nrts
  d15 <- sum(d15Vector)/nrts
  d16 <- sum(d16Vector)/nrts
  d17 <- sum(d17Vector)/nrts
  d18 <- sum(d18Vector)/nrts
  
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
  thetaVector[12] <- thetaVector[12] - alpha*d11
  thetaVector[13] <- thetaVector[13] - alpha*d12
  thetaVector[14] <- thetaVector[14] - alpha*d13
  thetaVector[15] <- thetaVector[15] - alpha*d14
  thetaVector[16] <- thetaVector[16] - alpha*d15
  thetaVector[17] <- thetaVector[17] - alpha*d16
  thetaVector[18] <- thetaVector[18] - alpha*d17
  thetaVector[19] <- thetaVector[19] - alpha*d18
  difference <- jThetaPrev - jTheta 
  print(paste (jTheta,difference, sep = " "))
}

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

thetaVectorSave <- c(  -5.2731463352 ,-0.0391156466,  0.2047103667, -0.8526245338, -0.4608198918,  0.9586537575,  0.0008612819, -0.3115071271,  0.0793552397,
                       0.5790823193,  0.3754773165,  1.3745852826,  0.9853677240,  0.1585624547, -3.0425458830, -4.9010248110,  1.9536201655, -1.0126784509,
                      -1.1583733831)
write(thetaVectorSave, file = "Thyroid_values.txt",
      ncolumns = if(is.character(thetaVectorSave)) 1 else 11,
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

user <- c(56,0,0,0,0,0,0,0,0,0,0,0,1.80,139,0.97,143)
tp_variable1 <-  user[1] * thetaVector[2]
tp_variable2 <-  user[2] * thetaVector[3]
tp_variable3 <-  user[3] * thetaVector[4]
tp_variable4 <-  user[4] * thetaVector[5]
tp_variable5 <-  user[5] * thetaVector[6]
tp_variable6 <-  user[6] * thetaVector[7]
tp_variable7 <-  user[7] * thetaVector[8]
tp_variable8 <-  user[8] * thetaVector[9]
tp_variable9 <-  user[9] * thetaVector[10]
tp_variable10 <-  user[10] * thetaVector[11]

thetaX_test_set <- vector(mode = "double",length = nrow(test_set))
thetaX_test_set <- thetaVector[1] + tp_variable1[,1] + tp_variable2[,1] + tp_variable3[,1] +
                   tp_variable4[,1] + tp_variable5[,1] + tp_variable6[,1] + tp_variable7[,1] +
                   tp_variable8[,1] + tp_variable9[,1] + tp_variable10[,1]
hypothesis_sigmoid <- 1/(1+exp(-thetaX_test_set))
# converting the hypothesis into class values for better prediction
y_prediction <- ifelse(hypothesis_sigmoid >= 0.5 , 1 , 0 )