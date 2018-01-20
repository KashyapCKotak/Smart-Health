<?php

system("RScript optimized_heartDisease.R");
include "globals_cardiology.php";

system("RScript liver.R");
include "globals_liver.php";

?>