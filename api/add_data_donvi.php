<?php
include("config.php");

$TenDV = addslashes($_GET['TenDV']);
$MoTaDV = addslashes($_GET['MoTaDV']);
if ($TenDV == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM donvi WHERE TenDV='$TenDV'")) > 0){
	$array_message['code'] = 0;
	$array_message['message'] = "Tên đơn vị này đã tồn tại.";
	echo json_encode($array_message);
	exit;
}
if ($MoTaDV == "")
{
	$MoTaDV = "Không có";
}
	$add_loaiphong = mysqli_query($conn,"INSERT INTO donvi	(
	MaDV , TenDV, MoTaDV, NgayTao, NgayCapNhat) 
		VALUE 
	('','{$TenDV}', '{$MoTaDV}', '{$time}', '{$time}')");
if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới đơn vị thành công !!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi thêm mới đơn vị: " . $conn->error;
}
echo json_encode($array_message);


?>