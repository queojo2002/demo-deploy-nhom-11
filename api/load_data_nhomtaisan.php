<?php
include("config.php");

$myArray = array();
$result = mysqli_query($conn, "	SELECT * FROM nhomtaisan ");
if ($conn->error == ""){
	while ($row = $result->fetch_assoc()) {
		$myArray[] = $row;
	}
}

echo json_encode($myArray, JSON_NUMERIC_CHECK);
?>
