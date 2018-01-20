#!/usr/bin/env Rscript
args = commandArgs(trailingOnly=TRUE)

if (length(args)==0) {
  stop("9 arguments must be supplied ", call.=FALSE)
} else{

thetaVector <- list()
thetaVector[[1]] <- array(1,dim = c(6,10))
thetaVector[[2]] <- matrix(1,nrow = 4,ncol = 7)
thetaVector[[3]] <- matrix(1,nrow = 1,ncol = 5)

# to store actual values of computation
nodes1 <- matrix(2,nrow = 10,ncol = 1)
nodes2 <- matrix(2,nrow = 7,ncol = 1)
nodes3 <- matrix(2,nrow = 5,ncol = 1)

mean1 <- c(4.442167,3.150805,3.215227,2.830161,3.234261,3.544656,3.445095,2.869693,1.603221)
sd1 <- c(2.820761,3.065145,2.988581,2.864562,2.223085,3.643857,2.449697,3.052666,1.732674)
nodes1 <- as.numeric(as.character(args))
# nodes1 <- c(1,5,1,1,1,2,1,3,1,1)
nodes1[2] <- (nodes1[2]-mean1[1])/sd1[1] 
nodes1[3] <- (nodes1[3]-mean1[2])/sd1[2] 
nodes1[4] <- (nodes1[4]-mean1[3])/sd1[3] 
nodes1[5] <- (nodes1[5]-mean1[4])/sd1[4] 
nodes1[6] <- (nodes1[6]-mean1[5])/sd1[5] 
nodes1[7] <- (nodes1[7]-mean1[6])/sd1[6] 
nodes1[8] <- (nodes1[8]-mean1[7])/sd1[7] 
nodes1[9] <- (nodes1[9]-mean1[8])/sd1[8] 
nodes1[10] <-(nodes1[10]-mean1[9])/sd1[9]

thetaVector[[1]][1,] <- c( 0.8994418, 2.305433,0.6608289, 1.2135491, 2.6736151,-2.061957, 2.9914579,-2.58318003,1.508388, 1.31004988)
thetaVector[[1]][2,] <- c(-0.8318523, 2.304946,1.0765075, 0.9392233, 0.5463855, 1.007979, 3.9487657,-3.07417550,2.062788, 3.81668193)
thetaVector[[1]][3,] <- c( 2.2123960, 1.617580,2.4704539, 1.0836505, 0.9110368, 2.594223, 4.4523135,-4.60819612,1.207236, 1.51936531)
thetaVector[[1]][4,] <- c( 3.9713265,-0.338702,2.5003158, 0.1665377,-1.6454859,-2.758862, 1.1059235,-3.96152141,3.615237,-0.37543658)
thetaVector[[1]][5,] <- c( 4.6622560,-1.047402,0.7647223, 1.2439348,-2.6128863,-2.765602,-0.9145395,-2.82973174,2.625558,-1.05261068)
thetaVector[[1]][6,] <- c(-3.0935496, 1.068330,3.6763729,-0.4351644,-0.5528682,-1.690256, 1.4366553, 0.07022067,1.642077,-0.03984931)

thetaVector[[2]][1,] <- c(-0.3135374,1.924870,0.288705,0.5729178, 2.213567,-2.799968,2.992319)
thetaVector[[2]][2,] <- c( 1.3180953,2.524378,1.603968,1.1343791, 1.067275, 3.084568,3.003460)
thetaVector[[2]][3,] <- c( 2.1218275,1.514147,2.525344,1.1409179, 1.325650, 3.034326,4.001421)
thetaVector[[2]][4,] <- c( 0.3711327,1.969175,4.632560,0.4365460,-2.395922,-3.400496,2.433149)

thetaVector[[3]][1,] <- c(-2.505007,1.36726,-2.166541,-2.387827,9.395507)

# nodes1 <-as.numeric(test_set[i,c(-10)])                   # input layer i.e layer1
nodes2 <- c(1,as.numeric(thetaVector[[1]] %*% nodes1))     # hidden layer1 i.e layer2
nodes2[-1] <- 1/(1+exp(-nodes2[-1]))
nodes3 <- c(1,as.numeric(thetaVector[[2]] %*% nodes2))     # hidden layer2 i.e layer3
nodes3[-1] <- 1/(1+exp(-nodes3[-1]))
h <- sum(as.numeric(thetaVector[[3]] * nodes3))               # output layer i.e layer4
h <- 1/(1+exp(-h))

# saving the vector in a .txt file
thetaVectorSave <- h
write(thetaVectorSave, file = "breastcancer_output.txt",
      ncolumns = if(is.character(thetaVectorSave)) 1 else 11,
      append = FALSE, sep = " ")
}