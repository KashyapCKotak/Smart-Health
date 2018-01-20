<header class="main-header">
	<?php 
	include "check_login.php"; 
	include "dbconnect.php";
	$sql = "SELECT `name`, `photo` FROM ".$_SESSION['type']." WHERE `email` = '".$_SESSION['login_user']."';";
    $result = mysql_query( $sql, $conn );
    $result_array = mysql_fetch_assoc($result);
	?>

	<a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sprint</b>Coders</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
      	<ul class="nav navbar-nav">
      		<li class="dropdown user user-menu">
	            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	              <img src="uploads/<?php echo $result_array['photo']; ?>" class="user-image" alt="User Image">
	              <span class="hidden-xs"><?php echo $result_array['name']; ?></span>
	            </a>
	            <ul class="dropdown-menu">
	              <!-- User image -->
	              <li class="user-header">
	                <img src="uploads/<?php echo $result_array['photo']; ?>"class="img-circle" alt="User Image">

	                <p>
	                  <?php echo $result_array['name']; ?>
	                </p>
	              </li>
	              <!-- Menu Footer-->
	              <li class="user-footer">
	                <div class="pull-left">
	                  <a href="index.php" class="btn btn-default btn-flat">Profile</a>
	                </div>
	                <div class="pull-right">
	                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
	                </div>
	              </li>
	            </ul>
          	</li>
      	</ul>
      </div>
    </nav>
</header>