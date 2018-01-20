<!DOCTYPE html>
<html>
<?php include "head.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">

<!-- -------------- Body Wrap  -------------- -->
<div id="wrapper">

    <?php include "header.php"; ?>
 
    <?php include "sidebar.php"; ?>


    <div class="content_wrapper">

        <section class="content-header">
            <h1>
                Result
                <small>Breast Cancer Check</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Breast Cancer Check</a></li>
                <li class="active">Report</li>
            </ol>
        </section>

        <?php
            function getvalue($value)
            {
                if ($value == "") {
                    return 0;
                }
                else {
                    return 1;
                }
            }
            if (isset($_POST['submit'])) {
                error_reporting(0);
                
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $input_age = $_POST['age'];
                $gender = $_POST['sex'];

                $clump_thickness = $_POST['clump_thickness'];
                $uniformity_of_cell_size = $_POST['uniformity_of_cell_size'];
                $uniformity_of_cell_shape = $_POST['uniformity_of_cell_shape'];
                $marginal_adhesion = $_POST['marginal_adhesion'];
                $single_epithelial_cell_size = $_POST['single_epithelial_cell_size'];
                $bare_nuclei = $_POST['bare_nuclei'];
                $bland_chromatin = $_POST['bland_chromatin'];
                $normal_nucleoli = $_POST['normal_nucleoli'];
                $mitoses = $_POST['mitoses'];

                echo exec("RScript breastcancer_input.R 1 $clump_thickness $uniformity_of_cell_size $uniformity_of_cell_shape $marginal_adhesion $single_epithelial_cell_size $bare_nuclei $bland_chromatin $normal_nucleoli $mitoses");

                $filename = "breastcancer_output.txt";

                $myfile = fopen("$filename","r");

                $output = fread($myfile, filesize("$filename"));

                $exploded = explode(" ", $output);

                $final_predict = $exploded[0];
            }

        ?>

        <section class="content">
            <div class="box box-primary">
                <div class="row">
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
                            <dd><?php echo $input_age; ?></dd>
                            <dt>Gender</dt>
                            <dd><?php echo $gender; ?></dd>
                          </dl>
                           <a data-toggle="modal" data-target="#thyroid-report" href="#">
                                <button type="button" class="btn btn-block btn-primary btn-lg">Report</button>
                            </a>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="thyroid-report" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <center><h3 class="modal-title" id="lineModalLabel">Breast Cancer Report</h3></center>
                    </div>
                    
                    <div class="modal-body" style="height:80vh;">
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
                                        <dd>Stay Healthy Stay Fit</dd>
                                        <dt>What not to do?</dt>
                                        <dd>Dont Smoke cigrate and dont consume liquor or alcoholic drinks.</dd>
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

    </div>
    <!-- -------------- /Main Wrapper -------------- -->
</div>
<!-- -------------- /Body Wrap  -------------- -->

<?php include "scripts.php"; ?>

</body>

</html>
