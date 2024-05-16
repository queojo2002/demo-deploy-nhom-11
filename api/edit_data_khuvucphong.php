<?php
include("config.php");

$MaKVP = addslashes($_GET['MaKVP']);
$TenKVP = addslashes($_GET['TenKVP']);
if ($MaKVP == "" or $TenKVP == "" )
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
mysqli_query($conn,"UPDATE `khuvucphong` SET `TenKVP` = '".$TenKVP."' where `MaKVP`='".$MaKVP."'");
mysqli_query($conn,"UPDATE `khuvucphong` SET `NgayCapNhat` = '".$time."' where `MaKVP`='".$MaKVP."'");

if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Sửa khu vực phòng thành công!!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi sửa khu vực phòng: " . $conn->error;
}
echo json_encode($array_message);


?>