<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="mybox" style="width: 500px; margin: auto;">

    <div class="row">
          <div>
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Patient</a></li>
                <li><a href="#tab_2" data-toggle="tab">Doctor</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="register-box">
                    <div class="register-logo">
                      <a href="../../index2.html"><b>Patient </b>Registeration</a>
                    </div>

                    <div class="register-box-body">
                      <p class="login-box-msg">Register a new membership</p>

                      <form action="register.php" method="post" enctype="multipart/form-data">
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Full name" name="name1">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="email" class="form-control" placeholder="Email" name="email1">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" placeholder="Password" name="pass1">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" placeholder="Retype password">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="number" class="form-control" placeholder="Enter height" name="height">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="number" class="form-control" placeholder="Enter weight" name="weight">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="date" class="form-control" placeholder="Enter date of birth" name="dob">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Enter contact" name="contact1">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Enter address" name="address">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Pincode" name="pincode">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="file" class="form-control" placeholder="Photo" name="fileToUpload">
                        </div>

                        <div class="form-group has-feedback">
                          <input type="hidden" id="latitude" class="form-control" placeholder="Photo" name="latitude" value="">
                        </div>

                        <div class="form-group has-feedback">
                          <input type="hidden" id="longitude" class="form-control" placeholder="Photo" name="longitude" value="">
                        </div>

                        <div class="form-group has-feedback">
                          <input type="hidden" name="type" class="form-control" value="patient">
                        </div>
                        
                        <div class="row">
                          <center>
                            <div style="width: 60%;" >
                              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit1">Register</button>
                            </div>
                          </center>
                        </div>
                      </form>

                      

                    </div>
                    <!-- /.form-box -->
                  </div>
                  <!-- /.register-box -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <div class="register-box">
                    <div class="register-logo">
                      <a href="../../index2.html"><b>Doctor </b>Registeration</a>
                    </div>

                    <div class="register-box-body">
                      <p class="login-box-msg">Register a new membership</p>

                      <form action="register.php" method="post" enctype="multipart/form-data">
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="First name" name="first_name">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Last name" name="last_name">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="email" class="form-control" placeholder="Email" name="email">
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Username" name="username">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" placeholder="Password" name="pass">
                          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                          <input type="password" class="form-control" placeholder="Retype password">
                          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Contact" name="contact">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Registeration Number" name="registeration_no">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Specialisation" name="specialisation">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Degree" name="degree">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="textarea" class="form-control" placeholder="Address" name="address">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Location" name="location">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="LinkedIn Profile" name="profile">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="file" class="form-control" placeholder="Photo" name="fileToUpload">
                          <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                          <input type="hidden" class="form-control" value="doctor" name="type">
                        </div>

                        <div class="row">
                          <div class="col-xs-8">
                            <div class="checkbox icheck pull-right">
                              <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                              </label>
                            </div>
                          </div>
                          <!-- /.col -->
                          
                          <!-- /.col -->
                        </div>
                        <div class="row">
                          <center>
                            <div style="width: 60%;" >
                              <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Register</button>
                            </div>
                          </center>
                        </div>
                      </form>

                    </div>
                    <!-- /.form-box -->
                  </div>
                  <!-- /.register-box -->
                </div>
                <!-- /.tab-pane -->
                
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
          <!-- /.col -->

          
          </div>
          <!-- /.col -->
    </div>

</div>
</body>

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>