<?php

$filename = "cardiology_values.txt";

$myfile = fopen("$filename","r");

$output = fread($myfile, filesize("$filename"));

$exploded = explode(" ", $output);

$_GLOBALS['constant'] = $exploded[0];
$_GLOBALS['age_value'] = $exploded[1];
$_GLOBALS['chest_pain_asympt_value'] = $exploded[2];
$_GLOBALS['chest_pain_atyp_angina_value'] = $exploded[3];
$_GLOBALS['chest_pain_non_anginal_value'] = $exploded[4];
$_GLOBALS['blood_pressure_value'] = $exploded[5];
$_GLOBALS['blood_sugar_value'] = $exploded[6];
$_GLOBALS['rest_electro_left_vent_hyper_value'] = $exploded[7];
$_GLOBALS['rest_electro_normal_value'] = $exploded[8];
$_GLOBALS['max_heart_rate_value'] = $exploded[9];
$_GLOBALS['exercise_angina_value'] = $exploded[10];

fclose($myfile);

$filename = "cardiology_scaling.txt";

$myfile = fopen("$filename","r");

$output = fread($myfile, filesize("$filename"));

$exploded = explode(" ", $output);

$_GLOBALS['mean_cardiology_age'] = $exploded[0];
$_GLOBALS['sd_cardiology_age'] = $exploded[1];
$_GLOBALS['mean_cardiology_rest_bpress'] = $exploded[2];
$_GLOBALS['sd_cardiology_rest_bpress'] = $exploded[3];
$_GLOBALS['mean_cardiology_max_heart_rate'] = $exploded[4];
$_GLOBALS['sd_cardiology_max_heart_rate'] = $exploded[5];

fclose($myfile);

?>