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
                                            <select id="sex" name="sex" class="form-control" required>
                                                <option value="">Sex</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                    </div>
                                </div>
                            </div>

                            <h3 class="box-title">Liver Function Test Results</h3>
                                <a data-toggle="modal" data-target="#lft-help" href="#"> 
                                    <span class="fa fa-question-circle"></span> 
                                </a>
                                <!-- ------ Liver Function Test help Modal -------- -->
                                <div class="modal fade" id="lft-help" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <center><h3 class="modal-title" id="lineModalLabel">Liver Function Test</h3></center>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <div class="tab-block mb25">
                                                    <ul class="nav nav-tabs tabs-border nav-justified">
                                                        <li class="active">
                                                            <a href="#lft-definition" data-toggle="tab">Definition</a>
                                                        </li>
                                                        <li>
                                                            <a href="#lft-what" data-toggle="tab">What?</a>
                                                        </li>
                                                        <li>
                                                            <a href="#lft-why" data-toggle="tab">Why?</a>
                                                        </li>
                                                        <li>
                                                            <a href="#lft-risks" data-toggle="tab">Risks</a>
                                                        </li>
                                                        <li>
                                                            <a href="#lft-results" data-toggle="tab">Results</a>
                                                        </li>
                                                    </ul>

                                                    <div class="tab-content">
                                                        <div id="lft-definition" class="tab-pane active">
                                                            <p>Liver function tests are blood tests used to help diagnose and monitor liver disease or damage. The tests measure the levels of certain enzymes and proteins in your blood.</p>

                                                            <p>Some of these tests measure how well the liver is performing its normal functions of producing protein and clearing bilirubin, a blood waste product. Other liver function tests measure enzymes that liver cells release in response to damage or disease.</p>

                                                            <p>Abnormal liver function test results don't always indicate liver disease. Your doctor will explain your results and what they mean.</p>
                                                        </div>
                                                        

                                                        <div id="lft-what" class="tab-pane">
                                                            <p>What can you expect?</p>
                                                            <p>During the test</p>
                                                            <p>The blood sample for liver function tests is usually drawn through a small needle inserted into a vein in the bend of your arm. The needle is attached to a small tube, to collect your blood. You may feel a quick pain as the needle is inserted into your arm and experience some short-term discomfort at the site after the needle is removed.</p>

                                                            <p>After the test</p>
                                                            <p>Your blood will be sent to a laboratory for analysis. If the lab analysis is done on-site, you could have your test results within hours. If your doctor sends your blood to an off-site laboratory, you may receive the results within several days.</p>
                                                        </div>
                                                       

                                                        <div id="lft-why" class="tab-pane">
                                                            <p>Liver function tests can be used to:</p>
                                                            <ul class="pl15">
                                                                <li>Screen for liver infections, such as hepatitis</li>
                                                                <li>Monitor the progression of a disease, such as viral or alcoholic hepatitis, and determine how well a treatment is working</li>
                                                                <li>Measure the severity of a disease, particularly scarring of the liver (cirrhosis)</li>
                                                                <li>Monitor possible side effects of medications</li>
                                                            </ul>
                                                            <p>Liver function tests check the levels of certain enzymes and proteins in your blood. Levels that are higher or lower than normal can indicate liver problems. </p>
                                                            <p>Some common liver function tests include:</p>
                                                            <dl>
                                                                <dt>Alanine transaminase (ALT).</dt><dd> ALT is an enzyme found in the liver that helps your body metabolize protein. When the liver is damaged, ALT is released into the bloodstream and levels increase.</dd>
                                                                <dt>Aspartate transaminase (AST).</dt><dd> AST is an enzyme that helps metabolize alanine, an amino acid. Like ALT, AST is normally present in blood at low levels. An increase in AST levels may indicate liver damage or disease or muscle damage.</dd>
                                                                <dt>Alkaline phosphatase (ALP).</dt><dd> ALP is an enzyme in the liver, bile ducts and bone. Higher-than-normal levels of ALP may indicate liver damage or disease, such as a blocked bile duct, or certain bone diseases.</dd>
                                                                <dt>Albumin and total protein.</dt><dd> Albumin is one of several proteins made in the liver. Your body needs these proteins to fight infections and to perform other functions. Lower-than-normal levels of albumin and total protein might indicate liver damage or disease.</dd>
                                                                <dt>Bilirubin.</dt><dd> Bilirubin is a substance produced during the normal breakdown of red blood cells. Bilirubin passes through the liver and is excreted in stool. Elevated levels of bilirubin (jaundice) might indicate liver damage or disease or certain types of anemia.</dd>
                                                                <dt>Gamma-glutamyltransferase (GGT).</dt><dd> GGT is an enzyme in the blood. Higher-than-normal levels may indicate liver or bile duct damage.</dd>
                                                                <dt>L-lactate dehydrogenase (LD).</dt><dd> LD is an enzyme found in the liver. Elevated levels may indicate liver damage but can be elevated in many other disorders.</dd>
                                                                <dt>Prothrombin time (PT).</dt><dd> PT is the time it takes your blood to clot. Increased PT may indicate liver damage but can also be elevated if you're taking certain blood-thinning drugs, such as warfarin.</dd>
                                                            </dl>
                                                        </div>


                                                        <div id="lft-risks" class="tab-pane">
                                                            <p>The blood sample for liver function tests is usually taken from a vein in your arm. The main risk associated with blood tests is soreness or bruising at the site of the blood draw. Most people don't have serious reactions to having blood drawn.</p>
                                                        </div>



                                                        <div id="lft-results" class="tab-pane">
                                                            <p>Normal blood test results for typical liver function tests include:</p>
                                                            <ul>
                                                                <li><strong>ALT.</strong> 7 to 55 units per liter (U/L)</li>
                                                                <li><strong>AST.</strong> 8 to 48 U/L</li>
                                                                <li><strong>ALP.</strong> 45 to 115 U/L</li>
                                                                <li><strong>Albumin.</strong> 3.5 to 5.0 grams per deciliter (g/dL)</li>
                                                                <li><strong>Total protein.</strong> 6.3 to 7.9 g/dL</li>
                                                                <li><strong>Bilirubin.</strong> 0.1 to 1.2 milligrams per deciliter (mg/dL)</li>
                                                                <li><strong>GGT.</strong> 9 to 48 U/L</li>
                                                                <li><strong>LD.</strong> 122 to 222 U/L</li>
                                                                <li><strong>PT.</strong> 9.5 to 13.8 seconds</li>
                                                            </ul><div id='adsmobileBottom'></div>
                                                            <p>These results are typical for adult men. Normal results vary from laboratory to laboratory and might be slightly different for women and children.</p>
                                                            <p>Your doctor will use these results to help diagnose your condition or determine treatment you might need. If you already have liver disease, liver function tests can help determine how your disease is progressing and if you're responding to treatment.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Total Bilirubin</label>
                                            <input type="number" name="tb" id="tb" min="0.4" max="75" class="form-control" placeholder="Total Bilirubin (mg/dL)" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Direct Bilirubin</label>
                                            <input type="number" name="db" id="db" min="0.1" max="19.7" class="form-control" placeholder="Direct Bilirubin (mg/dL)" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Alkphos Alkaline Phosphatase</label>
                                            <input type="number" name="aap" id="aap" min="63" max="2110" class="form-control" placeholder="Alkphos Alkaline Phosphatase (U/L)" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Sgpt Alamine Aminotransferase</label>
                                            <input type="number" name="sgpt" id="sgpt" min="10" max="2000" class="form-control" placeholder="Sgpt Alamine Aminotransferase (U/L)" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Aspartate Aminotransferase</label>
                                            <input type="number" name="sgot" id="sgot" min="10" max="5000" class="form-control" placeholder="Aspartate Aminotransferase (U/L)" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Total Protiens</label>
                                            <input type="number" name="tp" id="tp" min="2.7" max="10" class="form-control" placeholder="Total Protiens (g/dL)" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Albumin</label>
                                            <input type="number" name="alb" id="alb" min="0.9" max="5.5" class="form-control" placeholder="Albumin (g/dL)" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field">Albumin and Globulin Ratio</label>
                                            <input type="number" name="ag_ratio" id="ag_ratio" min="0" max="3" class="form-control" placeholder="Albumin and Globulin Ratio" step="0.01">
                                    </div>
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