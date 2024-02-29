<?php
require_once("server.php");

$makH = $_POST["makH"];
$tenKH = $_POST["tenKH"];
$sdtKH = $_POST["sdtKH"];
$diaChiKH = $_POST["diaChiKH"];
$gtKH = $_POST["gtKH"];
$emailKH = $_POST["emailKH"];

$sql = "UPDATE khachhang SET TENKH='" . $tenKH . "', SDTKH='" . $sdtKH . "', DIACHIKH='" . $diaChiKH . "', GTKH='" . $gtKH . "', EMAILKH='" . $emailKH . "' WHERE MAKH='" . $makH . "'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        $res["success"] = 1; // Thành công
    } else {
        $res["success"] = 0; // Thất bại
    }
} else {
    $res["success"] = 0; // Thất bại
    $res["error"] = mysqli_error($conn); // Lỗi từ MySQL
}

echo json_encode($res); // Trả về kết quả cho client
mysqli_close($conn);
?>
