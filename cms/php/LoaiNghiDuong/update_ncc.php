<?php
require_once("server.php");

$malh = $_POST["malh"];
$tenlh = $_POST["tenlh"];
$mota = $_POST["mota"];
$anhloaihinh = $_POST["anhloaihinh"];
$titleloaihinh = $_POST["titleloaihinh"];

$sql = "UPDATE loaihinh SET ANHLOAIHINH='" . $anhloaihinh . "', TENLOAIHINH='" . $tenlh . "', MOTALOAIHINH='" . $mota . "', titleloaihinh='" . $titleloaihinh . "' WHERE MALOAIHINH='" . $malh . "'";

$res = array(); // Tạo một mảng kết quả

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        $res["success"] = 1; // Thành công
    } else {
        $res["success"] = 0; // Thất bại
    }
} else {
    $res["success"] = 0; // Thất bại
}

echo json_encode($res); // Trả về kết quả cho client
mysqli_close($conn);
?>
