<?php

$filename = "thyroid_values.txt";

$myfile = fopen("$filename","r");

$output = fread($myfile, filesize("$filename"));

$exploded = explode(" ", $output);

$GLOBALS['constant_value'] = $exploded[0];
$GLOBALS['age_value'] = $exploded[1];
$GLOBALS['sex_value'] = $exploded[2];
$GLOBALS['on_thyroxine_value'] = $exploded[3];
$GLOBALS['query_on_thyroxine_value'] = $exploded[4];
$GLOBALS['on_antithyroid_medication_value'] = $exploded[5];
$GLOBALS['thyroid_surgery_value'] = $exploded[6];
$GLOBALS['query_hypothyroid_value'] = $exploded[7];
$GLOBALS['query_hyperthyroid_value'] = $exploded[8];
$GLOBALS['pregnant_value'] = $exploded[9];
$GLOBALS['sick_value'] = $exploded[10];
$GLOBALS['tumor'] = $exploded[11];
$GLOBALS['lithium_value'] = $exploded[12];
$GLOBALS['goitre_value'] = $exploded[13];
$GLOBALS['TSH_value'] = $exploded[14];
$GLOBALS['T3_value'] = $exploded[15];
$GLOBALS['TT4_value'] = $exploded[16];
$GLOBALS['T4U_value'] = $exploded[17];
$GLOBALS['FTI_value'] = $exploded[18];

fclose($myfile);

$filename = "thyroid_scaling.txt";

$myfile = fopen("$filename","r");

$output = fread($myfile, filesize("$filename"));

$exploded = explode(" ", $output);

$GLOBALS['mean_thyroid_age'] = $exploded[0];
$GLOBALS['sd_thyroid_age'] = $exploded[1];
$GLOBALS['mean_thyroid_TSH'] = $exploded[2];
$GLOBALS['sd_thyroid_TSH'] = $exploded[3];
$GLOBALS['mean_thyroid_T3'] = $exploded[4];
$GLOBALS['sd_thyroid_T3'] = $exploded[5];
$GLOBALS['mean_thyroid_TT4'] = $exploded[6];
$GLOBALS['sd_thyroid_TT4'] = $exploded[7];
$GLOBALS['mean_thyroid_T4U'] = $exploded[8];
$GLOBALS['sd_thyroid_T4U'] = $exploded[9];
$GLOBALS['mean_thyroid_FTI'] = $exploded[10];
$GLOBALS['sd_thyroid_FTI'] = $exploded[11];

fclose($myfile);

?>