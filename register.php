<?php
$connect=mysql_connect("localhost","root","root") or die(mysql_error());
mysql_select_db("bitcamp");
$user_type = $_POST['type'];

if($user_type == "doctor"){
	if(isset($_POST["submit"])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$name = $first_name." ".$last_name;
		$email = $_POST['email'];
		$username = $_POST['username'];


		$address = $_POST['address'];
		$address = urlencode($address);
		$location = $_POST['location'];
		$region = urlencode($location);

		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
		$json = json_decode($json);

		$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};


		$contact = $_POST['contact'];
		$rno = $_POST['registeration_no'];
		$spec = $_POST['specialisation'];
		$degree = $_POST['degree'];
		$profile = $_POST['profile'];
		$pass = $_POST['pass'];

		$target_dir = "uploads/";
		if(basename($_FILES["fileToUpload"]["name"] != "")) {
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			        $filename = basename( $_FILES["fileToUpload"]["name"]);
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
		}

		$query=mysql_query("INSERT INTO doctor(name,email,contact,photo,registeration_no,specialisation,degree,location,profile) VALUES('$name','$email','$contact','$filename','$rno','$spec','$degree','$location','$profile')");
		$query1 = mysql_query("INSERT INTO login VALUES('$email','$pass','$user_type')");
		$query2 = mysql_query("INSERT INTO ea_users(first_name, last_name,email,phone_number,location) VALUES('$first_name','$last_name','email','$contact','$location')");
		include "easyappointments/application/models/User_model.php;";
		$password = get_password($pass);
		//$query3 = mysql_query("INSERT INTO 	ea_user_settings(username, password) VALUES ('$username','$password')");

	}
}else{
	if(isset($_POST["submit1"])){

		$name = $_POST['name1'];
		$email = $_POST['email1'];
		$h = $_POST['height'];
		$w = $_POST['weight'];
		$dob = $_POST['dob'];
		$contact = $_POST['contact1'];
		$addr = $_POST['address'];
		$pincode = $_POST['pincode'];
		$pass = $_POST['pass1'];

		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		        $filename = basename( $_FILES["fileToUpload"]["name"]);
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$query=mysql_query("INSERT INTO patient (name,email,height,weight,dob,contact,pincode,address,photo) VALUES('$name','$email','$h','$w','$dob','$contact','$pincode','$addr','$filename')");
		$query1 = mysql_query("INSERT INTO login VALUES('$email','$pass','$user_type')");
	}
}

?>