<?php
include("config.php");
$myArray = array();
$MaND = addslashes($_GET['MaND']);
if ($MaND == "")
{
    echo json_encode($myArray, JSON_NUMERIC_CHECK);
	exit;
}

$result = mysqli_query($conn, "	SELECT baoloi.*, phong.TenP, taisan.TenTS FROM baoloi 
								INNER JOIN phanbo ON baoloi.MaPB = phanbo.MaPB 
								INNER JOIN phong ON phanbo.MaP = phong.MaP
								INNER JOIN taisan ON taisan.MaTS = phanbo.MaTS
							    Where baoloi.MaND = '$MaND'
							    ORDER BY baoloi.TrangThai ASC");
if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;	
	}
}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
