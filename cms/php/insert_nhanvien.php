<?php
require_once("server.php");

$maNV = $_POST["maNV"];
$tenNV = $_POST["tenNV"];
$sdtNV = $_POST["sdtNV"];
$diaChiNV = $_POST["diaChiNV"];
$gtNV = $_POST["gtNV"];
$emailNV = $_POST["emailNV"];
$nsNV = $_POST["nsNV"];

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM nhanvien WHERE MANV='" . $maNV . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Trả về client trùng dữ liệu
} else {
    $sql = "INSERT INTO nhanvien(MANV, TENNV, SDTNV, DIACHINV, GTNV, NSNV, EMAILNV) VALUES ('" . $maNV . "','" . $tenNV . "','" . $sdtNV . "','" . $diaChiNV . "','" . $gtNV . "','" . $nsNV . "','" . $emailNV . "')";

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
