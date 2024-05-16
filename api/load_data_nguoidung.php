<?php
include("config.php");

$myArray = array();
$result = mysqli_query($conn, "	SELECT * FROM nguoidung 
								INNER JOIN donvi ON nguoidung.MaDV = donvi.MaDV 
								INNER JOIN phanquyen ON nguoidung.MaPQ = phanquyen.MaPQ 
								INNER JOIN chucdanh ON nguoidung.MaCD = chucdanh.MaCD 
								Order By nguoidung.MaND");
if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;	
	}
}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
