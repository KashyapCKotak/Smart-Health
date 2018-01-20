<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-3">
          <?php 
            if(isset($_POST['submit'])){
              $temp = $_SESSION['login_user'];
              $_SESSION['login_user'] = $_POST['email'];
            }
            $sql = "SELECT `id`, `email`, `name`, `contact`, `profile`, `location`, `degree`, `specialisation`, `photo` FROM `doctor` WHERE `email` = '".$_SESSION['login_user']."' OR `username` = '". $_SESSION['login_user'] ."';";
            $result = mysql_query( $sql, $conn );
            $result_array = mysql_fetch_assoc($result);
            $doctor_id = $result_array['id'];
            if(isset($_POST['submit'])){
              $_SESSION['login_user'] = $temp;
            }
          ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="uploads/<?php echo $result_array['photo'];?>" alt="User profile picture">

              <h3 class="profile-username text-center">
                <?php 
                  echo $result_array['name'];
                ?>
              </h3>

              <p class="text-muted text-center">
                <?php
                  echo $result_array['degree'];
                ?>
              </p>
              
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Contact</b> <a class="pull-right"><?php echo $result_array['contact']; ?></a>
                </li>
                
                <?php 
                if (isset($result_array['contact'])){?>
                <li class="list-group-item">
                  <b>Social Profile</b> <a target="_blank" href="<?php echo $result_array['profile']; ?>" class="pull-right"><i style="font-size: 150%;" class="ion ion-social-linkedin"></i></a>
                </li>
                <?php } ?>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted"> <?php echo $result_array['specialisation']; ?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"> <?php echo $result_array['location']; ?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Appointments</a></li>
              <li><a href="#review" data-toggle="tab">Reviews</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <?php if(isset($_POST['submit'])){ ?>
                  <iframe src="http://[::1]/bitcamp_new/easyappointments" style="width: 100%; height:80vh;"></iframe>
                <?php }else{ ?>
                  <iframe src="http://localhost/bitcamp_new/easyappointments/index.php/backend" style="width: 100%; height:80vh;"></iframe> 
                <?php } ?> 
              </div>
              <div class="tab-pane" id="review">
                <div id="container">
    
                <header>
                  <h1>Add a review</h1>
                </header>

                <div id="shouts">
                  <ul>
                    <?php 
                      include "database.php";
                      $query = "SELECT * FROM review WHERE doctor_id = $doctor_id";
                      $result = mysqli_query($con, $query);
                      while($row = mysqli_fetch_assoc($result)) {
                            $q = "SELECT `name` FROM `patient` where `id` =".$row['patient_id'].";" ;
                            $r = mysqli_query($con, $q);
                            $r1 = mysqli_fetch_assoc($r); ?>
                            <li class='shout'><span><?php echo $row['date']; ?> - </span><strong> <?php echo $r1['name']; ?> </strong>: <?php echo $row['message']; ?></li>
                      <?php }   ?>
                  </ul>
                </div>

                <div id="input">

                  <?php if(isset($_GET['error'])) : ?>
                    <div class="error"><?php echo $_GET['error']; ?></div>
                  <?php endif; ?>

                  <form method="post" action="">
                    <input type="hidden" name="user" value="<?php echo $_SESSION['name']; ?>">
                    <input type="hidden" name="id" value="<?php echo $doctor_id ?>">
                    <div class="form-group">
                      <input type="text" class="form-control" name="message" placeholder="Enter Your Message">
                    </div>
                    <br>
                    <input type="submit" name="review_submit" type="submit" value="Add review" class="shout-btn">
                  </form>
                  <?php 

                    // Check if form submitted
                    if(isset($_POST['review_submit'])) {
                        
                        $user = mysqli_real_escape_string($con, $_POST['user']);
                        $message = mysqli_real_escape_string($con, $_POST['message']);
                        $id = mysqli_real_escape_string($con, $_POST['id']);
                        // Set timezone
                        date_default_timezone_set('Asia/Kolkata');
                        $time = date('d-m-Y', time());

                        // Validate input
                        if(!isset($user) || $user == '' || !isset($message) || $message == '') {
                          $error = "Please fill in your name and a message";
                        } else {
                          echo $query = "INSERT INTO review (`patient_id`, `doctor_id`, `message`, `date`) 
                                VALUES ('$user', '$id', '$message', '$time')";

                          if(!mysqli_query($con, $query)) {
                            die('Error: '.mysqli_error($con));
                          } else {
                            header("Refresh: 0");
                          }
                        }

                    }
                    ?>
                </div>

              </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>