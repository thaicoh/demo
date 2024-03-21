<?php
require_once ("server.php");

$maKH = $_POST["maKH"];
$tenKH = $_POST["tenKH"];
$sdtKH = $_POST["sdtKH"];
$emailKH = trim($_POST['emailKH']);
$matKhauKH = $_POST["matKhauKH"];
$anhKH = $_POST["anhKH"];
$gioiTinh = $_POST["gioiTinh"];
$vaiTro = 0;

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khachhang WHERE MAKH='" . $maKH . "'");
$row = mysqli_fetch_array($rs);

if ((int) $row['total'] > 0) {
    $res["success"] = 2; // Trả về client trùng dữ liệu
} else {
    $sql = "INSERT INTO khachhang(MAKH, TENKH, SDTKH, EMAILKH, MATKHAUKH, ANHKH, GIOITINH, VAITRO) VALUES ('" . $maKH . "','" . $tenKH . "','" . $sdtKH . "','" . $emailKH . "','" . $matKhauKH . "','" . $anhKH . "','" . $gioiTinh . "','" . $vaiTro . "')";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $res["success"] = 1; // Thành công
        } else {
            $res["success"] = 0; // Thất bại
        }
    } else {
        $res["success"] = 0; // Thất bại
    }
}

echo json_encode($res);
mysqli_close($conn);
?>