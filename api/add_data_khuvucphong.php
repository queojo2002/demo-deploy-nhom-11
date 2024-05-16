<?php
include("config.php");
include("check_session.php");

$tenkvp = addslashes($_GET['TenKVP']);
if ($tenkvp == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM khuvucphong WHERE TenKVP='$tenkvp'")) > 0){
	$array_message['code'] = 0;
	$array_message['message'] = "Tên khu vực phòng này đã tồn tại.";
	echo json_encode($array_message);
	exit;
}
	$add_loaiphong = mysqli_query($conn,"INSERT INTO khuvucphong	(
	MaKVP, TenKVP, NgayCapNhat, NgayTao) 
		VALUE 
	('','{$tenkvp}', '{$time}', '{$time}')");
if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới khu vực phòng thành công !!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi thêm mới khu vực phòng: " . $conn->error;
}
echo json_encode($array_message);


?>