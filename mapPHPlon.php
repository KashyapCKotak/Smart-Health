<?php
	//$zip=isset($_GET['Zip']);
	$zip=600478;
	include 'dbconnect.php';
	$sql="Select `longitude` from doctor where `zip` LIKE $zip";
	$result = mysql_query( $sql, $conn );
	$num_rows = mysql_num_rows($result);
	$Lon=array();
	if($num_rows>=1)
	{
		$count=0;
		while($res_array = mysql_fetch_assoc($result))
		{
			$Lon[$count]=$res_array['longitude'];
			$count++;
		}
	}
	else
	{
		$Lon[0]=null; 
	}
	echo json_encode($Lon);
?>