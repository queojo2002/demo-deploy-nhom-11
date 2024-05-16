<?php
include("config.php");
$MaDV = addslashes($_GET['MaDV']);
$TenDV = addslashes($_GET['TenDV']);
$MoTa = addslashes($_GET['MoTaDV']);
if ($MaDV == "" or $TenDV == "" )
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}



mysqli_query($conn,"UPDATE `donvi` SET `TenDV` = '".$TenDV."' where `MaDV`='".$MaDV."'");
mysqli_query($conn,"UPDATE `donvi` SET `MoTaDV` = '".$MoTa."' where `MaDV`='".$MaDV."'");
mysqli_query($conn,"UPDATE `donvi` SET `NgayCapNhat` = '".$time."' where `MaDV`='".$MaDV."'");

if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Sửa đơn vị thành công!!!";
}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi sửa đơn vị: " . $conn->error;
}
echo json_encode($array_message);


?>