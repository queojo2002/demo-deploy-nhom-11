<?php
include("config.php");


$MaBL = $_GET['MaBL'];
$TrangThai = $_GET['TrangThai'];
if ($MaBL == "" or $TrangThai == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa có đầy đủ thông tin để!!!";
	echo json_encode($array_message);
	exit;
}else if ($TrangThai != "1" and $TrangThai != "2" and $TrangThai != "3" and $TrangThai != "4" and $TrangThai != "5")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Trạng thái không hợp lệ";
	echo json_encode($array_message);
	exit;
}




mysqli_query($conn,"UPDATE `baoloi` SET `TrangThai` = ".$TrangThai." where `MaBL`='".$MaBL."'");
mysqli_query($conn,"UPDATE `baoloi` SET `NgayCapNhat` = '".$time."' where `MaBL`='".$MaBL."'");
if ($conn->error == ""){
    $array_message['code'] = 1;
	$array_message['message'] = "Chỉnh sửa trạng thái báo lỗi thành công !" . $conn->error;
	echo json_encode($array_message);
	exit();	
}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi chỉnh sửa trạng thái báo lỗi: " . $conn->error;
	echo json_encode($array_message);
	exit();
}