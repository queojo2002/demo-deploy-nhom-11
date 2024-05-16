<?php 
date_default_timezone_set('Asia/Ho_Chi_Minh');


$time = date('Y-m-d H:i:s');
$conn       = mysqli_connect('localhost', 'jrpfrdmk', 'iz14tKY9f0', 'jrpfrdmk_kkts') or die ('Connect DB Failed');
mysqli_query($conn,"SET NAMES utf8");









function _add_data_nkhd($conn, $MaND_add, $HanhDong, $ChiTietHanhDong, $time)
{
	return mysqli_query($conn,"INSERT INTO nhatkyhoatdong	(
	MaNKHD, MaND, HanhDong, ChiTietHanhDong, Time) 
		VALUE 
	('','{$MaND_add}', '{$HanhDong}', '{$ChiTietHanhDong}', '{$time}')");
}



