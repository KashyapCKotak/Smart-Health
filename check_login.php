<?php
	session_start();
	if(isset($_SESSION['login_user'])){
		include "dbconnect.php";
		$sql1 = "SELECT `name`  FROM ". $_SESSION['type'] ." WHERE `email` LIKE '". $_SESSION['login_user'] ."'";
        $result1 = mysql_query( $sql1, $conn );
        $num_rows1 = mysql_num_rows($result1);
        $row1 = mysql_fetch_assoc($result1);
        $name = $row1['name'];
        $_SESSION['name'] = $name;
        $name = explode(" ", $name);
        $_SESSION['first_name'] = $name[0];
        $_SESSION['last_name'] = $name[1];

		//echo "<form style='float: right;' action='logout.php' method='post'><input type='submit' name='logout' value='Logout'></form><p/>";
	}else
		header("Location: login.php");
?>