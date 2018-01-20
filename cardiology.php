
<style>
    body {
        min-height: 2300px;
    }

    .content-header b,
    .allcp-form .panel.heading-border:before,
    .allcp-form .panel .heading-border:before {
        transition: all 0.7s ease;
    }

    @media (max-width: 800px) {
        .allcp-form .panel-body {
            padding: 18px 12px;
        }

        .option-group .option {
            display: block;
        }

        .option-group .option + .option {
            margin-top: 8px;
        }
    }
    input[type="radio"],
    input[type="checkbox"] {
      margin: 4px 0 0;
      margin-top: 1px \9;
      line-height: normal;
    }

</style>


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

    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Cardiology</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="cardiology_result.php" id="allcp-form">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="field">First Name</label>
                                        <input type="text" name="firstname" id="firstname" <?php if (isset($_SESSION['login_user'])) {echo "value='".$_SESSION['first_name']."'"; }?> class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="field">Last Name</label>
                                        <input type="text" name="lastname" id="lastname" <?php if (isset($_SESSION['login_user'])) {echo "value='".$_SESSION['last_name']."'";}?> class="form-control" placeholder="Last Name">
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="field">Age</label>
                                        <input type="number" name="age" id="age" min="1" max="120" class="form-control" placeholder="Age" required>
                                </div>
                            </div>
                        </div>

                        <h6 class="mb20" id="spy1">Symptoms</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field select">Chest Pain</label>
                                        <select id="selectID" name="chest_pain" class="form-control" required>
                                            <option value="">Chest Pain</option>
                                            <option value="1000">Asympt</option>
                                            <option value="100">A Type Angina</option>
                                            <option value="10">Non Anginal</option>
                                            <option value="1">Type Anginal</option>
                                        </select>
                                        <i class="arrow double"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field">Blood Pressure Reading</label>
                                        <input type="number" name="blood_pressure_reading" id="blood_pressure_reading" min="1" max="300" class="form-control" placeholder="Blood Pressure Reading"  required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field select">Electrolyte Count</label>
                                        <select id="selectID" name="electrolyte_count" class="form-control" required>
                                            <option value="">Electrolyte Count</option>
                                            <option value="100">Left Ventricle Hyper</option>
                                            <option value="10">Normal</option>
                                            <option value="1">Abnormal</option>
                                        </select>
                                        <i class="arrow double"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="switch block mt15"></label>
                                        <input type="checkbox" name="diabetes" id="diabetes" value="diabetes" />
                                        <label for="diabetes" data-on="YES" data-off="NO"></label>
                                        <span>Do you have diabetes?</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="field">Max Heart Rate</label>
                                        <input type="number" name="heart_rate" id="heart_rate" min="1" max="200" class="form-control" placeholder="Max Heart Rate"  required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="switch block mt15"></label>
                                        <input type="checkbox" name="exercise_angina" id="exercise_angina" value="exercise_angina" checked/>
                                        <label for="exercise_angina" data-on="YES" data-off="NO"></label>
                                        <span>Do you do exercise with angina? 
                                            <a data-toggle="modal" data-target="#angina-exercise-help" href="#"> 
                                                <span class="fa fa-question-circle"></span> 
                                            </a>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <!---------- angina-exercise-help Modal -------- -->
                        <div class="modal fade" id="angina-exercise-help" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <center><h3 class="modal-title" id="lineModalLabel">Angina &amp; Physical Activity</h3></center>
                                    </div>
                                    
                                    <div class="modal-body" style="height: 80vh;">
                                        <object data="assets/angina-exercise-help.pdf" type="application/pdf" width="100%" height="100%">
                                          Your browser does not support pdfs, <a href="docs/nivea.pdf">click here to
                                          download the file.</a>
                                        </object>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer text-right">
                            <input type="submit" name="submit" value="Submit" class="btn btn-bordered btn-primary mb5"></input>
                        </div>    

                    </div>
                </form>
        </div>
    </section>
</div>
