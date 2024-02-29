<?php
require_once("server.php");

$manv = $_POST["manv"];
$tennv = $_POST["tennv"];
$sdtnv = $_POST["sdtnv"];
$diachinv = $_POST["diachinv"];
$gtnv = $_POST["gtnv"];
$emailnv = $_POST["emailnv"];
$nsnv = $_POST["nsnv"];

$sql = "UPDATE nhanvien SET TENNV='" . $tennv . "', SDTNV='" . $sdtnv . "', DIACHINV='" . $diachinv . "', GTNV='" . $gtnv . "', EMAILNV='" . $emailnv . "', NSNV='" . $nsnv . "' WHERE MANV='" . $manv . "'";

$res = [];

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
