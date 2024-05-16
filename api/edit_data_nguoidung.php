<?php
include("config.php");

$MaND = addslashes($_GET['MaND']);
$hovaten = addslashes($_GET['HoVaTen']);
$sdt = addslashes($_GET['SoDienThoai']);
$matkhau = addslashes($_GET['MatKhau']);
$MaPQ = addslashes($_GET['MaPQ']);
$MaDV = addslashes($_GET['MaDV']);
$MaCD = addslashes($_GET['MaCD']);
if ($MaND == "" or $hovaten == "" or $MaPQ == "" or $MaDV == "" or $MaCD == "" or $sdt == "" or $matkhau == "")
{
	$array_message['code'] = 0;
	$array_message['message'] = "Chưa nhập đầy đủ thông tin !!!";
	echo json_encode($array_message);
	exit;
}



mysqli_query($conn,"UPDATE `nguoidung` SET `MaDV` = '".$MaDV."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `MaPQ` = '".$MaPQ."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `MaCD` = '".$MaCD."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `HoVaTen` = '".$hovaten."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `SoDienThoai` = '".$sdt."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `MatKhau` = '".$matkhau."' where `MaND`='".$MaND."'");
mysqli_query($conn,"UPDATE `nguoidung` SET `NgayCapNhat` = '".$time."' where `MaND`='".$MaND."'");

if ($conn->error == ""){
	//_add_data_nkhd($conn, $data['MaND'],"Sửa", "Sửa thông tin người dùng có Mã ND: ". $MaND,$time);
	$array_message['code'] = 1;
	$array_message['message'] = "Sửa người dùng thành công!!!";

}else {
	$array_message['code'] = 0;
	$array_message['message'] = "Có lỗi khi sửa người dùng: " . $conn->error;
}
echo json_encode($array_message);


?>