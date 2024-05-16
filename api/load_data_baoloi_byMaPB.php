<?php
include("config.php");
$myArray = array();
$MaPB = addslashes($_GET['MaPB']);
if ($MaPB == "")
{
    echo json_encode($myArray, JSON_NUMERIC_CHECK);
	exit;
}
$result = mysqli_query($conn, "	SELECT baoloi.* FROM baoloi 
								INNER JOIN phanbo ON baoloi.MaPB = phanbo.MaPB 
								INNER JOIN phong ON phanbo.MaP = phong.MaP
								INNER JOIN taisan ON taisan.MaTS = phanbo.MaTS
							    Where baoloi.MaPB = '$MaPB' and baoloi.TrangThai <= 3");
if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;	
	}
}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
