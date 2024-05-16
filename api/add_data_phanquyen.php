<?php
include("config.php");

$TenPQ = addslashes($_GET['TenPQ']);
$MoTaPQ = addslashes($_GET['MoTaPQ']);
if ($TenPQ == ""){
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM phanquyen WHERE TenPQ='$TenPQ'")) > 0){
	$array_message['code'] = 0;
	$array_message['message'] = "Tên phân quyền này đã tồn tại.";
	echo json_encode($array_message);
	exit;
}
if ($MoTaPQ == "")
{
	$MoTaPQ = "Không có";
}
$add = mysqli_query($conn,"INSERT INTO phanquyen	(
MaPQ , TenPQ, MoTaPQ, NgayTao, NgayCapNhat) 
	VALUE 
('','{$TenPQ}', '{$MoTaPQ}', '{$time}', '{$time}')");
if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới phân quyền thành công !!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi thêm mới phân quyền: " . $conn->error;
}
echo json_encode($array_message);


?>