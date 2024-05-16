<?php
include("config.php");



$myArray = array();
$result = mysqli_query($conn, "	SELECT * FROM phong 
								INNER JOIN khuvucphong ON phong.MaKVP = khuvucphong.MaKVP 
								INNER JOIN loaiphong ON loaiphong.MaLP = phong.MaLP ");
if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;
	}

}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
