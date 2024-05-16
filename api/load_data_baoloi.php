<?php
include("config.php");
$myArray = array();
$Loai = $_GET['cmd'];

if ($Loai == "Home")
{
    $result = mysqli_query($conn, "	SELECT baoloi.*, phong.TenP, taisan.TenTS, nguoidung.token, nguoidung.HoVaTen, nguoidung.Email FROM baoloi 
								INNER JOIN phanbo ON baoloi.MaPB = phanbo.MaPB 
								INNER JOIN phong ON phanbo.MaP = phong.MaP
								INNER JOIN taisan ON taisan.MaTS = phanbo.MaTS
								INNER JOIN nguoidung ON nguoidung.MaND = baoloi.MaND
							    Where baoloi.TrangThai <= 3
							    ORDER BY baoloi.MaBL DESC
							    LIMIT 5");
}else if ($Loai == "Admin"){
    $result = mysqli_query($conn, "	SELECT baoloi.*, phong.TenP, taisan.TenTS, nguoidung.token, nguoidung.HoVaTen, nguoidung.Email FROM baoloi 
								INNER JOIN phanbo ON baoloi.MaPB = phanbo.MaPB 
								INNER JOIN phong ON phanbo.MaP = phong.MaP
								INNER JOIN taisan ON taisan.MaTS = phanbo.MaTS
								INNER JOIN nguoidung ON nguoidung.MaND = baoloi.MaND
							    ORDER BY baoloi.TrangThai ASC");
}

if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;	
	}
}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
