<?php
include("config.php");

$hovaten = addslashes($_GET['HoVaTen']);
$email = addslashes($_GET['Email']);
$MaPQ = addslashes($_GET['MaPQ']);
$MaDV = addslashes($_GET['MaDV']);
$MaCD = addslashes($_GET['MaCD']);
$Uid = addslashes($_GET['UID']);
$Token = addslashes($_GET['TOKEN']);

if ($hovaten == "" or $email == "" or $MaPQ == "" or $MaDV == "" or $MaCD == "" or $Uid == ""or $Token == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}
if (mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nguoidung WHERE Email='$email'")) > 0){
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới người dùng thành công !!!";
	echo json_encode($array_message);
	exit;
}
	$add_nguoidung = mysqli_query($conn,"INSERT INTO nguoidung	(
	MaND, MaDV, MaCD, MaPQ, TenDangNhap, MatKhau, HoVaTen, Email, SoDienThoai, DiaChi, uid, token, NgayTao, NgayCapNhat) 
		VALUE 
	('','{$MaDV}', '{$MaCD}', '{$MaPQ}', '{$email}', '11111111111111111', '{$hovaten}', '{$email}', '0326393540', 'Khong Co', '{$Uid}', '{$Token}','{$time}', '{$time}')");
if ($conn->error == ""){
	//_add_data_nkhd($conn, $data['MaND'],"Thêm","Thêm mới người dùng có Tên đăng nhập là: " . $tendangnhap, $time);
	$array_message['code'] = 1;
	$array_message['message'] = "Thêm mới người dùng thành công !!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi thêm mới người dùng: " . $conn->error;
}
echo json_encode($array_message);


?>