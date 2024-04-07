<?php
require_once("server.php");

$maKND = $_POST["maknd"];

$sql = "DELETE FROM resort WHERE MARESORT ='" . $maKND . "'";
$res = [];

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        $res["success"] = 1; // Xóa dữ liệu thành công
    } else {
        $res["success"] = 0; // Không có dữ liệu nào được xóa
    }
} else {
    $res["success"] = 0; // Xóa dữ liệu thất bại
}

echo json_encode($res); // Trả về client
mysqli_close($conn);
