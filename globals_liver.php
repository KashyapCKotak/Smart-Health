<?php

$filename = "liver_values.txt";

$myfile = fopen("$filename","r");

$output = fread($myfile, filesize("$filename"));

$exploded = explode(" ", $output);

$_GLOBALS['constant'] = $exploded[0];
$_GLOBALS['age'] = $exploded[1];
$_GLOBALS['gender'] = $exploded[2];
$_GLOBALS['tb'] = $exploded[3];
$_GLOBALS['db'] = $exploded[4];
$_GLOBALS['aap'] = $exploded[5];
$_GLOBALS['sgpt'] = $exploded[6];
$_GLOBALS['sgot'] = $exploded[7];
$_GLOBALS['tp'] = $exploded[8];
$_GLOBALS['alb'] = $exploded[9];
$_GLOBALS['ag_ratio'] = $exploded[10];

fclose($myfile);

$filename = "liver_scaling.txt";

$myfile = fopen("$filename","r");

$output = fread($myfile, filesize("$filename"));

$exploded = explode(" ", $output);

$_GLOBALS['age_mean'] = $exploded[0];
$_GLOBALS['age_sd'] = $exploded[1];
$_GLOBALS['tb_mean'] = $exploded[2];
$_GLOBALS['tb_sd'] = $exploded[3];
$_GLOBALS['db_mean'] = $exploded[4];
$_GLOBALS['db_sd'] = $exploded[5];
$_GLOBALS['aap_mean'] = $exploded[6];
$_GLOBALS['aap_sd'] = $exploded[7];
$_GLOBALS['sgpt_mean'] = $exploded[8];
$_GLOBALS['sgpt_sd'] = $exploded[9];
$_GLOBALS['sgot_mean'] = $exploded[10];
$_GLOBALS['sgot_sd'] = $exploded[11];
$_GLOBALS['tp_mean'] = $exploded[12];
$_GLOBALS['tp_sd'] = $exploded[13];
$_GLOBALS['alb_mean']=$exploded[14];
$_GLOBALS['alb_sd']=$exploded[15];
$_GLOBALS['ag_ratio_mean']=$exploded[16];
$_GLOBALS['ag_ratio_sd']=$exploded[17];


fclose($myfile);

?>