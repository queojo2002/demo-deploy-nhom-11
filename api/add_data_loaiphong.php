<?php
include("config.php");

$tenLP = addslashes($_GET['TenLP']);
if ($tenLP == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM loaiphong WHERE TenLP='$tenLP'")) > 0){
	$array_message['code'] = 0;
	$array_message['message'] = "Tên loại phòng này đã tồn tại.";
	echo json_encode($array_message);
	exit;
}
	$add_loaiphong = mysqli_query($conn,"INSERT INTO loaiphong	(
	MaLP , TenLP, NgayCapNhat, NgayTao) 
		VALUE 
	('','{$tenLP}', '{$time}', '{$time}')");
if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới loại phòng thành công !!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi thêm mới loại phòng: " . $conn->error;
}
echo json_encode($array_message);


?>