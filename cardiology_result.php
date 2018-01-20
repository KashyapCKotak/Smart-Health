<!DOCTYPE html>
<html>

<?php include "head.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

    <?php include "header.php"; ?>

    <?php include "sidebar.php"; ?>

        <?php
            if (isset($_POST['submit'])) {
                error_reporting(0);
                include "globals_cardiology.php";
                
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];

                $age = $_POST['age'];
                $age_scaled = ( $age - $_GLOBALS['mean_age'] ) / $_GLOBALS['sd_age'];

                $blood_pressure = $_POST['blood_pressure_reading'];
                $blood_pressure_scaled = ( $blood_pressure - $_GLOBALS['mean_rest_bpress'] ) / $_GLOBALS['sd_rest_bpress'];

                $max_heart_rate = $_POST['heart_rate'];
                $max_heart_rate = ( $max_heart_rate - $_GLOBALS['mean_max_heart_rate'] ) / $_GLOBALS['sd_max_heart_rate'];

                $input = array('constant' => 1, 'age' => $age_scaled, 'asympt' => 0, 'atyp_angina' => 0, 'non_anginal' => 0, 'blood_pressure' => $blood_pressure_scaled, 'blood_sugar' => 0, 'rest_electro_left_vent_hyper' => 0, 'rest_electro_normal' => 0, 'max_heart_rate' => $max_heart_rate, 'exercise_angina' => 0);

                $blood_sugar = $_POST['diabetes'];
                if ($blood_sugar == "diabetes") {
                    $input['blood_sugar'] = 1;
                }

                $exercise_angina = $_POST['exercise_angina'];
                if ($exercise_angina == "exercise_angina") {
                    $input['exercise_angina'] = 1;
                }

                $chest_pain = $_POST['chest_pain'];
                if ($chest_pain == 1000) {
                    $input['asympt'] = 1;
                }
                elseif ($chest_pain == 100) {
                    $input['atyp_angina'] = 1;
                }
                elseif ($chest_pain == 10) {
                    $input['non_anginal'] = 1;
                }

                $electrolyte_count = $_POST['electrolyte_count'];
                if ($electrolyte_count == 100) {
                    $input['rest_electro_left_vent_hyper'] = 1;
                }
                elseif ($electrolyte_count == 10) {
                    $input['rest_electro_normal'] = 1;
                }

                $prediction =   $_GLOBALS['constant'] * $input['constant'] +
                                $_GLOBALS['age_value'] * $input['age'] +
                                $_GLOBALS['chest_pain_asympt_value'] * $input['asympt'] +
                                $_GLOBALS['chest_pain_atyp_angina_value'] * $input['atyp_angina'] +
                                $_GLOBALS['chest_pain_non_anginal_value'] * $input['non_anginal'] +
                                $_GLOBALS['blood_pressure_value'] * $input['blood_pressure'] +
                                $_GLOBALS['blood_sugar_value'] * $input['blood_sugar'] +
                                $_GLOBALS['rest_electro_left_vent_hyper_value'] * $input['rest_electro_left_vent_hyper'] +
                                $_GLOBALS['rest_electro_normal_value'] * $input['rest_electro_normal'] +
                                $_GLOBALS['max_heart_rate_value'] * $input['max_heart_rate'] +
                                $_GLOBALS['exercise_angina_value'] * $input['exercise_angina'];

                
                $final_predict = 1 / (1 + exp(-1 * $prediction));
            }

        ?>

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <!-- -------------- Content -------------- -->
        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Cardiology
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Services</a></li>
                <li class="active">Cardiology</li>
              </ol>
            </section>
        <!-- -------------- /Topbar -------------- -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                      <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Cardiology</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-6">
                                  <div class="box box-solid">
                                    <div class="box-header with-border">

                                      <h3 class="box-title">Prediction</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                      <dl>
                                        <dt>Name</dt>
                                        <dd><?php echo $firstname . " " . $lastname; ?></dd>
                                        <dt>Age</dt>
                                        <dd><?php echo $age; ?></dd>
                                      </dl>
                                        <a data-toggle="modal" data-target="#cardiology-report" href="#"> 
                                         <button type="button" class="btn btn-block btn-primary btn-lg">Report</button>
                                        </a>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                  <!-- /.box -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





        <div class="modal fade" id="cardiology-report" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h3 class="modal-title" id="lineModalLabel">Cardiology Report</h3></center>
                    </div>
                    
                    <div class="modal-body">
                        <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">
                                <i class="fa fa-address-card-o"></i><?php echo $firstname . " " . $lastname; ?>
                            </span>
                        </div>
                        <!-- -------------- /Panel Heading -------------- -->

                        <div class="panel-body  ph15">
                            <div class="section row">
                                <div class="col-md-12 ph15">
                                    <div><?php if($final_predict <= 0.5){ echo "<p class='negative-result'>You have tested <strong>NEGATIVE</strong></p>"; }else{ echo "<p class='positive-result'>You have tested <strong>POSITIVE</strong></p>";} ?></div>
                                </div>
                            </div>
                            <div class="row">
                                <p>Keep your heart healthy.</p>
                                <div>
                                    <dl class="dl-horizontal">
                                        <dt>What to do?</dt>
                                        <dd>Exercise daily.</dd>
                                        <dd>Stay healthy Stay fit</dd>
                                        <dt>What not to do?</dt>
                                        <dd>Dont smole cigrates and consume alcoholic health.</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <!-- -------------- /Content -------------- -->

        <!-- -------------- Page Footer -------------- -->
        <!-- -------------- /Page Footer -------------- -->

    </section>
    <?php include "footer.php"; ?> 
    <!-- -------------- /Main Wrapper -------------- -->
</div>
<!-- -------------- /Body Wrap  -------------- -->

<?php include "scripts.php"; ?>

</body>

</html>
