<?php
session_destroy();
unset($_SESSION['login_user']);
//header("Location: http://[::1]/bitcamp_new/easyappointments/index.php/user/logout");
header("Location: login.php");
?>