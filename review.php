<!DOCTYPE html>
<html>
<?php include "head.php"; ?>
<head><link rel="stylesheet" type="text/css" href="css/style.css"></head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "header.php"; ?>
  <?php include "sidebar.php"; ?>

  <?php include "dbconnect.php"; ?>


  <div id="container">
		
		<header>
			<h1>Add a review</h1>
		</header>

		<div id="shouts">
			<ul>
				<?php while($row = mysqli_fetch_assoc($shouts)) : ?>
					<li class="shout"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?>:</strong> <?php echo $row['message'] ?> </li>
				<?php endwhile; ?>
			</ul>
		</div>

		<div id="input">

			<?php if(isset($_GET['error'])) : ?>
				<div class="error"><?php echo $_GET['error']; ?></div>
			<?php endif; ?>

			<form method="post" action="process.php">
				<input type="text" name="user" placeholder="Enter Your Name">
				<input type="text" name="message" placeholder="Enter Your Message">
				<br>
				<input type="submit" name="submit" type="submit" value="Add review" class="shout-btn">
			</form>
		</div>

	</div>


  <?php include "footer.php"; ?>
</div>
<!-- ./wrapper -->

<?php include "scripts.php"; ?>
</body>
</html>