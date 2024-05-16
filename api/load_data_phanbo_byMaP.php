<?php
include("config.php");

$MaP = addslashes($_GET['MaP']);
if ($MaP == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
$myArray = array();
$result = mysqli_query($conn, "	select count(phanbo.SoLuong) OVER () as 'SoLuongTong', phanbo.*, taisan.TenTS, loaitaisan.TenLTS, nhomtaisan.TenNTS, phong.TenP from phanbo
								INNER JOIN phong ON phong.MaP = phanbo.MaP
								INNER JOIN taisan ON phanbo.MaTS = taisan.MaTS
								INNER JOIN loaitaisan ON loaitaisan.MaLTS = taisan.MaLTS
								INNER JOIN nhomtaisan ON nhomtaisan.MaNTS = taisan.MaNTS
								Where phanbo.MaP = '$MaP'");

if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;
	}
}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
