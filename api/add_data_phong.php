<?php
include("config.php");

$tenphong = addslashes($_GET['TenP']);
$makvp = addslashes($_GET['MaKVP']);
$malp = addslashes($_GET['MaLP']);
if ($tenphong == "" or $makvp == "" or $malp == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM phong WHERE TenP='$tenphong'")) > 0){
	$array_message['code'] = 0;
	$array_message['message'] = "Tên phòng này đã tồn tại. Vui lòng chọn tên phòng khác!";
	echo json_encode($array_message);
	exit;
}
	$add_phong = mysqli_query($conn,"INSERT INTO phong	(
	MaP, MaLP, MaKVP, TenP, NgayCapNhat, NgayTao) 
		VALUE 
	('','{$malp}', '{$makvp}', '{$tenphong}', '{$time}', '{$time}')");
if ($conn->error == ""){
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới phòng thành công !!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi thêm mới phòng: " . $conn->error;
}
echo json_encode($array_message);


?>