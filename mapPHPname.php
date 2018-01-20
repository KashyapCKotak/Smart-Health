<?php
	//$zip=isset($_GET['Zip']);
	$zip=600478;
	include 'dbconnect.php';
	$sql="Select `name`, `specialisation` from doctor where `zip` LIKE $zip";
	$result = mysql_query( $sql, $conn );
	$num_rows = mysql_num_rows($result);
	$name=array();
	$count=0;
	if($num_rows>=1)
	{
		while($res_array = mysql_fetch_assoc($result))
		{
			$name[$count]=$res_array['name'];
			$count++;
		}
		
	}
	else
	{
		$name[0]=null; 
	}
	//echo "<script>alert($name)</script>";
	//print_r ($name);
	echo json_encode($name);
?>