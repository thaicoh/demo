<?php
require_once("server.php");

$maKH = $_POST["maKH"];
$tenKH = $_POST["tenKH"];
$sdtKH = $_POST["sdtKH"];
$emailKH = trim($_POST['emailKH']);
$matKhauKH = $_POST["matKhauKH"];
$anhKH = "";
$gioiTinh = $_POST["gioiTinh"];

$sql = "UPDATE khachhang SET TENKH='" . $tenKH . "', SDTKH='" . $sdtKH . "', EMAILKH='" . $emailKH . "', MATKHAUKH='" . $matKhauKH . "', ANHKH='" . $anhKH . "', GIOITINH='" . $gioiTinh .  "' WHERE MAKH='" . $maKH . "'";

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
