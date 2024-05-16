<?php
include("config.php");
$myArray = array();
$Email = addslashes($_GET['Email']);
if ($Email == "")
{
	echo "{}";
	exit;
}
$result = mysqli_query($conn, "Select nguoidung.*, chucdanh.TenCD, donvi.TenDV, phanquyen.TenPQ from nguoidung
								INNER JOIN donvi ON nguoidung.MaDV = donvi.MaDV 
								INNER JOIN phanquyen ON nguoidung.MaPQ = phanquyen.MaPQ 
								INNER JOIN chucdanh ON nguoidung.MaCD = chucdanh.MaCD 
								Where nguoidung.Email = '$Email'");

if ($conn->error != ""){
    echo "{}";
	exit;
}else {
    echo json_encode(mysqli_fetch_array($result, MYSQLI_ASSOC), JSON_NUMERIC_CHECK);
}

?>
