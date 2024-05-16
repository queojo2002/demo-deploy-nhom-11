<?php
include("config.php");
$MaLP = addslashes($_GET['MaLP']);
$TenLP = addslashes($_GET['TenLP']);
if ($MaLP == "" or $TenLP == "" )
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}



mysqli_query($conn,"UPDATE `loaiphong` SET `TenLP` = '".$TenLP."' where `MaLP`='".$MaLP."'");
mysqli_query($conn,"UPDATE `loaiphong` SET `NgayCapNhat` = '".$time."' where `MaLP`='".$MaLP."'");

if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Sửa khu vực phòng thành công!!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi sửa khu vực phòng: " . $conn->error;
}
echo json_encode($array_message);


?>