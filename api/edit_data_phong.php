<?php
include("config.php");
$MaP = addslashes($_GET['MaP']);
$TenP = addslashes($_GET['TenP']);
$MaKVP = addslashes($_GET['MaKVP']);
$MaLP = addslashes($_GET['MaLP']);
if ($MaP == "" or $TenP == "" or $MaKVP == "" or $MaLP == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}



mysqli_query($conn,"UPDATE `phong` SET `MaKVP` = '".$MaKVP."' where `MaP`='".$MaP."'");
mysqli_query($conn,"UPDATE `phong` SET `MaLP` = '".$MaLP."' where `MaP`='".$MaP."'");
mysqli_query($conn,"UPDATE `phong` SET `TenP` = '".$TenP."' where `MaP`='".$MaP."'");
mysqli_query($conn,"UPDATE `phong` SET `NgayCapNhat` = '".$time."' where `MaP`='".$MaP."'");

if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Sửa phòng thành công!!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi sửa phòng: " . $conn->error;
}
echo json_encode($array_message);


?>