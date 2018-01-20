
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
      			<?php 
              if (isset($_POST['patient_search'])){
                $temp = $_SESSION['login_user'];
                $_SESSION['login_user'] = $_POST['email'];
              }
      				$sql = "SELECT `id`, `name`, `height`, `weight`, `dob`, `contact`, `address`, `photo` FROM `patient` WHERE `email` = '".$_SESSION['login_user']."';";
      				$result = mysql_query( $sql, $conn );
      				$result_array = mysql_fetch_assoc($result);
              if (isset($_POST['patient_search'])){
                $_SESSION['login_user'] = $temp; 
              }
      			  ?>
              <img class="profile-user-img img-responsive img-circle" src="uploads/<?php echo $result_array['photo']; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $result_array['name'];?></h3>
			  

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Contact</b> <a class="pull-right"><?php echo $result_array['contact'];?></a>
                </li>
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
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
              <p class="text-muted"><?php echo $result_array['address'];?></p>
              <hr>
			  <strong><i class="fa fa-medkit margin-r-5"></i> Allergies</strong>
              <p class="text-muted">
				<?php 
          include "dbconnect.php";
					$sql1 = "SELECT `allergy_name` FROM `allergies` WHERE `patient_id` = '".$result_array['id']."';";
					$res1 = mysql_query( $sql1, $conn );
					
					$color=0;
					$count=0;
					while ($res_array = mysql_fetch_assoc($res1))
					{
						if($color==0)
						{
							echo "<div class='bg-red disabled color-palette'><span>",$res_array['allergy_name'],"</span></div>";
							$color=1;
							$count++;
							continue;
						}
						if($color==1)
						{
							echo "<div class='bg-red color-palette'><span>",$res_array['allergy_name'],"</span></div>";
							$color=0;
							$count++;
							continue;
						}
					}
				?>
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
            <?php if (isset($_POST['patient_search'])){ ?>
              <li class="active"><a href="#activity" data-toggle="tab">Nearby Doctors</a></li>
            <?php }else{ ?>
              <li class="active"><a href="#activity" data-toggle="tab">Nearby Doctors</a></li>
              <li><a href="#timeline" data-toggle="tab">Book Appointment</a></li>
              <!-- <li><a href="#settings" data-toggle="tab">Review</a></li> -->
              <?php } ?>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
			           <iframe src="map.html" style="width: 100%; height: 80vh;"></iframe>
              </div>
              <div class="tab-pane" id="timeline">
                 <iframe src="http://localhost/bitcamp_new/easyappointments/" style="width: 100%; height: 80vh;"></iframe>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  