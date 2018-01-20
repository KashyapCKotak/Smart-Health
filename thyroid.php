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
</style>

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
                    <!-- form start -->
                    <form method="post" action="Liver_result.php" id="allcp-form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="field">First Name</label>
                                            <input type="text" name="firstname" id="firstname" <?php if (isset($_SESSION['login_user'])) {echo "value='".$_SESSION['first_name']."'";}?> class="form-control" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="field select">Gender</label>
                                            <select id="sex" name="sex" class="form-control" onclick="pregnantCheck()" required>
                                                <option value="">Sex</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                function pregnantCheck(){
                                        var x = document.getElementById('sex').value;
                                        if (x == "male")
                                            document.getElementById('pregnant').disabled = true;
                                        else
                                            document.getElementById('pregnant').disabled = false;
                                }
                                </script>
                            </div>


                            <h6 class="mb20" id="spy1">Symptoms</h6>
                            <!-- -------------- Symptoms -------------- -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="on_thyroxine" id="on_thyroxine" value="on_thyroxine" checked/>
                                            <label for="on_thyroxine" data-on="YES" data-off="NO"></label>
                                            <span>On Thyroxine?</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="on_antithyroid_medication" id="on_antithyroid_medication" value="on_antithyroid_medication" checked/>
                                            <label for="on_antithyroid_medication" data-on="YES" data-off="NO"></label>
                                            <span>On Antithyroid Medication?</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="thyroid_surgery" id="thyroid_surgery" value="thyroid_surgery" checked/>
                                            <label for="thyroid_surgery" data-on="YES" data-off="NO"></label>
                                            <span>Have you undergone any thyroid surgery?</span>
                                        </label>
                                    </div>
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="query_hypothyroid" id="query_hypothyroid" value="query_hypothyroid" checked/>
                                            <label for="query_hypothyroid" data-on="YES" data-off="NO"></label>
                                            <a href="#" data-toggle="tooltip" title="A condition where the thyroid gland does not create enough of thyroid hormone called thyroxine">
                                                <span>Hypothyroid?</span>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="query_hyperthyroid" id="query_hyperthyroid" value="query_hyperthyroid" checked/>
                                            <label for="query_hyperthyroid" data-on="YES" data-off="NO"></label>
                                            <a href="#" data-toggle="tooltip" title="A condition where the thyroid gland produces too much of thyroid hormone called thyroxine">
                                                <span>Hyperthyroid?</span>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="pregnant" id="pregnant" value="pregnant"/>
                                            <label for="pregnant" data-on="YES" data-off="NO"></label>
                                            <span>Are you pregnant?</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="sick" id="sick" value="sick" checked/>
                                            <label for="sick" data-on="YES" data-off="NO"></label>
                                            <span>Are you sick?</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="lithium" id="lithium" value="lithium" checked/>
                                            <label for="lithium" data-on="YES" data-off="NO"></label>
                                            <span>Lithium?</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="tumor" id="tumor" value="tumor"/>
                                            <label for="tumor" data-on="YES" data-off="NO"></label>
                                            <span>Do you have tumor?</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="switch block mt15">
                                            <input type="checkbox" name="goitre" id="goitre" value="" checked/>
                                            <label for="goitre" data-on="YES" data-off="NO"></label>
                                            <span>Do you have goitre?</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <h6 class="mb20" id="spy1">Blood Test Results</h6>
                            <!-- -------------- Blood Test Results -------------- -->
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="#" data-toggle="tooltip" title="Thyroid Stimulating Hormone Content">
                                        <div class="form-group">
                                            <label class="field">TSH</label>
                                                <input type="number" name="TSH" id="TSH" min="0" max="530" class="gui-input" placeholder="TSH" step="0.01">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" data-toggle="tooltip" title="Triiodothyronine Hormone Content">
                                        <div class="form-group">
                                            <label class="field">T3</label>
                                                <input type="number" name="T3" id="T3" min="0" max="9.80" class="gui-input" placeholder="T3" step="0.01">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" data-toggle="tooltip" title="Total T4 OR Total Thyroxine">
                                        <div class="form-group">
                                            <label class="field">TT4</label>
                                                <input type="number" name="TT4" id="TT4" min="2" max="450" class="gui-input" placeholder="TT4" step="0.01">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" data-toggle="tooltip" title="Thyroxine Utilization Rates">
                                        <div class="form-group">
                                            <label class="field">T4U</label>
                                                <input type="number" name="T4U" id="T4U" min="0" max="2.21" class="gui-input" placeholder="T4U" step="0.01">
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" data-toggle="tooltip" title="Thyroid Function Tests">
                                        <div class="form-group">
                                            <label class="field">FTI</label>
                                                <input type="number" name="FTI" id="FTI" min="0" max="485" class="gui-input" placeholder="FTI" step="0.01">
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="panel-footer text-right">
                                <input type="submit" name="submit" value="Submit" class="btn btn-bordered btn-primary mb5"></input>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>