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
                include "globals_liver.php";
                
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];

                
                $age = $_POST['age'];
                $age_scaled = ( $age - $_GLOBALS['age_mean'] ) / $_GLOBALS['age_sd'];
                $gender = $_POST['sex'];
                if ($gender == 'male') {
                    $sex = 1;
                }elseif ($gender == 'female') {
                    $sex = 0;
                }

                $tb = $_POST['tb'];
                $tb = ($tb - $_GLOBALS['tb_mean']) / $_GLOBALS['tb_sd'];
                $db = $_POST['db'];
                $db = ($db - $_GLOBALS['db_mean']) / $_GLOBALS['db_sd'];
                $aap = $_POST['aap'];
                $aap = ($aap - $_GLOBALS['aap_mean']) / $_GLOBALS['aap_sd'];
                $sgpt = $_POST['sgpt'];
                $sgpt = ($sgpt - $_GLOBALS['sgpt_mean']) / $_GLOBALS['sgpt_sd'];
                $sgot = $_POST['sgot'];
                $sgot = ($sgot - $_GLOBALS['sgot_mean']) / $_GLOBALS['sgot_sd'];
                $tp = $_POST['tp'];
                $tp = ($tp - $_GLOBALS['tp_mean']) / $_GLOBALS['tp_sd'];
                $alb = $_POST['alb'];
                $alb = ($alb - $_GLOBALS['alb_mean']) / $_GLOBALS['alb_sd'];
                $ag_ratio = $_POST['ag_ratio'];
                $ag_ratio = ($ag_ratio - $_GLOBALS['ag_ratio_mean']) / $_GLOBALS['ag_ratio_sd'];

                $prediction = 1 * $_GLOBALS['constant'] + 
                            $age_scaled * $_GLOBALS['age'] +  
                            $sex * $_GLOBALS['gender'] + 
                            $tb * $_GLOBALS['tb']+ 
                            $db * $_GLOBALS['db']+ 
                            $aap * $_GLOBALS['aap'] + 
                            $sgpt * $_GLOBALS['sgpt'] + 
                            $sgot * $_GLOBALS['sgot'] + 
                            $tp * $_GLOBALS['tp'] + 
                            $alb * $_GLOBALS['alb']+ 
                            $ag_ratio * $_GLOBALS['ag_ratio'];

                $final_predict = 1 / (1 + exp(-1 * $prediction));
            }

        ?>

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <!-- -------------- Content -------------- -->
        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Liver
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Services</a></li>
                <li class="active">Liver</li>
              </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                      <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Liver</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-6">
                                  <div class="box box-solid">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Prediction</h3>
                                    </div>

                                    <div class="box-body">
                                      <dl>
                                        <dt>Name</dt>
                                        <dd><?php echo $firstname . " " . $lastname; ?></dd>
                                        <dt>Age</dt>
                                        <dd><?php echo $age; ?></dd>
                                      </dl>
                                        <a data-toggle="modal" data-target="#liver-report" href="#"> 
                                         <button type="button" class="btn btn-block btn-primary btn-lg">Report</button>
                                        </a>
                                    </div>
                                    <!-- /.box-body -->
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <div class="modal fade" id="liver-report" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h3 class="modal-title" id="lineModalLabel">Report</h3></center>
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
                                        <dd>Dont Smoke and dont consume liquor or any other alcoholic drinks</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- -------------- /Content -------------- -->

        <!-- -------------- Page Footer -------------- -->
        <?php include "footer.php"; ?> 
        <!-- -------------- /Page Footer -------------- -->

    </section>
    <!-- -------------- /Main Wrapper -------------- -->
</div>
<!-- -------------- /Body Wrap  -------------- -->

<?php include "scripts.php"; ?>

</body>

</html>
