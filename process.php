<?php 

	include 'database.php';

	// Check if form submitted
	if(isset($_POST['submit'])) {
		
		$user = mysqli_real_escape_string($con, $_POST['user']);
		$message = mysqli_real_escape_string($con, $_POST['message']);

		// Set timezone
		date_default_timezone_set('Asia/Kolkata');
		$time = date('d-m-Y', time());

		// Validate input
		if(!isset($user) || $user == '' || !isset($message) || $message == '') {
			$error = "Please fill in your name and a message";
			header("Location: review.php?error=".urlencode($error));
			exit();
		} else {
			$query = "INSERT INTO review (user, message, time) 
					  VALUES ('$user', '$message', '$time')";

			if(!mysqli_query($con, $query)) {
				die('Error: '.mysqli_error($con));
			} else {
				header("Location: review.php");
				exit();
			}
		}

	}

 ?>