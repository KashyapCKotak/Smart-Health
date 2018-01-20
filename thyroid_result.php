<!DOCTYPE html>
<html>

<?php include "head.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

    <?php include "header.php"; ?>

    <?php include "sidebar.php"; ?>

    <!-- -------------- Main Wrapper -------------- -->
    <section id="content_wrapper">

        <!-- -------------- Content -------------- -->
        <div class="content-wrapper">
            <section class="content-header">
              <h1>
                Thyroid
              </h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Services</a></li>
                <li class="active">Thyroid</li>
              </ol>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                      <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                              <h3 class="box-title">Thyroid</h3>
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
                    </div>
                </div>

                <div class="modal fade" id="thyroid-report" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <center><h3 class="modal-title" id="lineModalLabel">Thyroid Report</h3></center>
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
                                                <dd>Stay Fit Stay Healthy.</dd>
                                                <dt>What not to do?</dt>
                                                <dd>Dont smoke and dont consume liqour or any other alcoholic drinks</dd>
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
