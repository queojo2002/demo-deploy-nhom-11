<?php
include("config.php");

$myArray = array();
$result = mysqli_query($conn, "	SELECT taisan.*, loaitaisan.TenLTS, nhomtaisan.TenNTS FROM taisan 
								INNER JOIN loaitaisan ON taisan.MaLTS = loaitaisan.MaLTS 
								INNER JOIN nhomtaisan ON taisan.MaNTS = nhomtaisan.MaNTS");
if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;	
	}
}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
