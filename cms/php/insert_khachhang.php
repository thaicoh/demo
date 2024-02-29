<?php
require_once("server.php");

$maKH = $_POST["maKH"];
$tenKH = $_POST["tenKH"];
$sdtKH = $_POST["sdtKH"];
$diaChiKH = $_POST["diaChiKH"];
$gtKH = $_POST["gtKH"];
$emailKH = $_POST["emailKH"];

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khachhang WHERE MAKH='" . $maKH . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Trả về client trùng dữ liệu
} else {
    $sql = "INSERT INTO khachhang(MAKH, TENKH, SDTKH, DIACHIKH, GTKH, EMAILKH) VALUES ('" . $maKH . "','" . $tenKH . "','" . $sdtKH . "','" . $diaChiKH . "','" . $gtKH . "','" . $emailKH . "')";

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
