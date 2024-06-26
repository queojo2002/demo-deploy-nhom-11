<?php
$title = "Load data người dùng";
include("config.php");
include("check_session.php");
$txtSearch = "";
$myArray = array();

if (isset($_GET['txtSearch']))
{
	$txtSearch = $_GET['txtSearch'];
	$result = mysqli_query($conn, "	select count(MaBL) as total from baoloi
								INNER JOIN phanbo ON baoloi.MaPB = phanbo.MaPB 
								INNER JOIN phong ON phanbo.MaP = phong.MaP
								INNER JOIN taisan ON taisan.MaTS = phanbo.MaTS");
}else {
	$result = mysqli_query($conn, 'select count(MaBL) as total from baoloi');
}
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;

$result = mysqli_query($conn, "	SELECT baoloi.MaBL, phong.TenP, taisan.TenTS, baoloi.NgayCapNhat, baoloi.TrangThai, baoloi.Mota FROM baoloi 
								INNER JOIN phanbo ON baoloi.MaPB = phanbo.MaPB 
								INNER JOIN phong ON phanbo.MaP = phong.MaP
								INNER JOIN taisan ON taisan.MaTS = phanbo.MaTS
								ORDER BY baoloi.MaBL DESC
								LIMIT $start, $limit");
if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;	
	}
	$array_message['code'] = 1;
	$array_message['numSize'] = $total_page;
	$array_message['pageCurrent'] = intval($current_page);
	$array_message['data'] = $myArray;
}else {
	$array_message['code'] = 0;
	$array_message['numSize'] = 1;
	$array_message['pageCurrent'] = 1;
	$array_message['data'] = NULL;
}

echo json_encode($array_message);
?>
