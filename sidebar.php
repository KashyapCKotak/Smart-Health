<?php
  include "check_login.php"; 
  include "dbconnect.php";
  if ($_SESSION['type'] == "doctor") {
   $sql = "SELECT `name`, `photo` FROM `doctor` WHERE `email` = '".$_SESSION['login_user']."';";
    $result = mysql_query( $sql, $conn );
    $result_array = mysql_fetch_assoc($result);
  }elseif ($_SESSION['type'] == "patient") {
    $sql = "SELECT `name`, `photo` FROM `patient` WHERE `email` = '".$_SESSION['login_user']."';";
    $result = mysql_query( $sql, $conn );
    $result_array = mysql_fetch_assoc($result);
  }
  
?>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="uploads/<?php echo $result_array['photo'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $result_array['name']; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php if($_SESSION['type'] == "patient"){ ?>
          <li class="active">
            <a href="search_doctors.php">
              <i class="fa fa-medkit"></i> <span>Search For Doctor</span>
            </a>
          </li>
        <?php }elseif ($_SESSION['type'] == "doctor"){ ?>
          <li class="active">
            <a href="search_patients.php">
              <i class="fa fa-medkit"></i> <span>Patient Lookup</span>
            </a>
          </li>
        <?php } ?>
        <li class="active">
          <a href="nearby_hospitals_home.php">
            <i class="fa fa-medkit"></i> <span>Nearby Hospitals</span>
          </a>
        </li>
        <li class="active">
          <a href="#">
            <i class="fa fa-heart"></i> <span>Disease Prediction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="cardiology_home.php"><i class="fa fa-circle-o"></i> Cardiology</a></li>
            <li><a href="breast_cancer_home.php"><i class="fa fa-circle-o"></i> Breast Cancer</a></li>
            <li><a href="thyroid_home.php"><i class="fa fa-circle-o"></i> Thyroid</a></li>
            <li><a href="liver_home.php"><i class="fa fa-circle-o"></i> Liver</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>