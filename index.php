<!DOCTYPE html>
<html>
<?php include "head.php"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "header.php"; ?>
  <?php include "sidebar.php"; ?>

  <?php include "dbconnect.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <?php 
	if ($_SESSION['type']=="patient") {
		include "patient_profile.php";
	}elseif ($_SESSION['type']=="doctor") {
		include "doctor_profile.php";
	}
  ?>
  <!-- /.content-wrapper -->
  <?php include "footer.php"; ?>
</div>
<!-- ./wrapper -->

<?php include "scripts.php"; ?>
</body>
</html>
