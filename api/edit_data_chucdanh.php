<?php
include("config.php");
$MaCD = addslashes($_GET['MaCD']);
$TenCD = addslashes($_GET['TenCD']);
$MoTa = addslashes($_GET['MoTaCD']);
if ($MaCD == "" or $TenCD == "" )
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}



mysqli_query($conn,"UPDATE `chucdanh` SET `TenCD` = '".$TenCD."' where `MaCD`='".$MaCD."'");
mysqli_query($conn,"UPDATE `chucdanh` SET `MoTaCD` = '".$MoTa."' where `MaCD`='".$MaCD."'");
mysqli_query($conn,"UPDATE `chucdanh` SET `NgayCapNhat` = '".$time."' where `MaCD`='".$MaCD."'");

if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Sửa chức danh thành công!!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi sửa chức danh: " . $conn->error;
}
echo json_encode($array_message);


?>