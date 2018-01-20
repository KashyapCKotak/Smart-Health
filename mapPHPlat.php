<?php
	//$zip=isset($_GET['Zip']);
	$zip=600478;
	include 'dbconnect.php';
	$sql="Select `latitude` from doctor where `zip` LIKE $zip";
	$result = mysql_query( $sql, $conn );
	$num_rows = mysql_num_rows($result);
	$Lat=array();
	$count=0;
	if($num_rows>=1)
	{
		while($res_array = mysql_fetch_assoc($result))
		{
			$Lat[$count]=$res_array['latitude'];
			$count++;
		}
	}
	else
	{
		$Lat[0]=null; 
	}	
	echo json_encode($Lat);
?>