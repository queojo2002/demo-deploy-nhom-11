<?php
include("config.php");


$MaND = addslashes($_GET['MaND']);
$Uid = addslashes($_GET['UID']);
$Token = addslashes($_GET['TOKEN']);


if ($MaND == "" or $Uid == "" or $Token == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}


mysqli_query($conn,"UPDATE `nguoidung` SET `token` = '".$Token."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `uid` = '".$Uid."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `NgayCapNhat` = '".$time."' where `MaND`='".$MaND."'");

if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Sửa người dùng thành công!!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi sửa người dùng: " . $conn->error;
}
echo json_encode($array_message);


?>