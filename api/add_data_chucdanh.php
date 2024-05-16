<?php
include("config.php");

$TenCD = addslashes($_GET['TenCD']);
$MoTa = addslashes($_GET['MoTaCD']);
if ($TenCD == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM chucdanh WHERE TenCD='$TenCD'")) > 0){
	$array_message['code'] = 0;
	$array_message['message'] = "Tên chức danh này đã tồn tại.";
	echo json_encode($array_message);
	exit;
}
if ($MoTa == "")
{
	$MoTa = "Không có";
}
	$add_loaiphong = mysqli_query($conn,"INSERT INTO chucdanh	(
	MaCD , TenCD, MoTaCD, NgayTao, NgayCapNhat) 
		VALUE 
	('','{$TenCD}', '{$MoTa}', '{$time}', '{$time}')");
if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới chức danh thành công !!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi thêm mới chức danh: " . $conn->error;
}
echo json_encode($array_message);


?>