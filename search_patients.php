<!DOCTYPE html>
<html>

<?php include "head.php"; ?>

<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

    <?php include "header.php"; ?>

    <?php include "sidebar.php"; ?>


    <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Doctor Search
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Services</a></li>
        <li class="active">Doctor Search</li>
      </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-4">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Patient Lookup</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form method="post" action="search_patients.php" id="allcp-form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="field">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="First Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel-footer text-right">
		                                <input type="submit" name="submit" value="Submit" class="btn btn-bordered btn-primary mb5"></input>
		                            </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
			<?php 
				if(isset($_POST['submit'])){ 
					include "dbconnect.php";
					$name = $_POST['name'];
					$sql = "SELECT `email`, `name`, `contact`, `address` FROM `patient` WHERE `name` LIKE '%$name%';";
      				$result = mysql_query( $sql, $conn );
      				while($result_array = mysql_fetch_assoc($result)){
				?>
			            <div class="col-md-4">
			              <!-- general form elements -->
			                <div class="box box-primary">
			                    <div class="box-header with-border">
			                      <h3 class="box-title"><?php echo $result_array['name'];?></h3>
			                    </div>
			                    <!-- /.box-header -->
			                    <div class="box-body">
			                   		<br><b>Email:</b> <?php echo $result_array['email'];?>
			                   		<br><b>Location:</b> <?php echo $result_array['address'];?>
                                    <br><b>Contact:</b> <?php echo $result_array['contact'];?>
			                    </div>
			                	<form method="post" action="view_patient_profile.php" id="allcp-form">
			                        <div class="box-body">
			                            <div class="row">
			                                <div class="col-md-12">
			                                    <div class="form-group">
			                                        <input type="hidden" name="email" id="name" class="form-control" value="<?php echo $result_array['email'];?>">
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="row">
			                                <div class="col-md-12">
			                                    <div class="panel-footer text-right">
					                                <input type="submit" name="patient_search" value="View" class="btn btn-bordered btn-primary mb5"></input>
					                            </div>
			                                </div>
			                            </div>
			                        </div>
			                    </form>
			                </div>
			            </div>

			    <?php } }?>
        </div>
    </section>




</div>
<!-- -------------- /Body Wrap  -------------- -->

<?php include "scripts.php"; ?>

</body>

</html>
