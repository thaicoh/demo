<?php
require_once("server.php");

$maDonHang = $_POST["madonhang"];
$maKhachHang = $_POST["makh"];
$maNhanVien = $_POST["manv"];
$ngayDat = $_POST["ngaydat"];
$tongHoaDon = $_POST["tonghoadon"];
$ghiChu = $_POST["ghichu"];

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM donhang WHERE MADONHANG='" . $maDonHang . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Trả về client - Trùng dữ liệu
} else {
    $sql = "INSERT INTO donhang (MADONHANG, MAKH, MANV, NGAYDAT, TONGHOADON, GHICHU) VALUES ('" . $maDonHang . "', '" . $maKhachHang . "', '" . $maNhanVien . "', '" . $ngayDat . "', '" . $tongHoaDon . "', '" . $ghiChu . "')";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $res["success"] = 1; // Thêm dữ liệu thành công
        } else {
            $res["success"] = 0; // Thêm dữ liệu thất bại
        }
    } else {
        $res["success"] = 0; // Thêm dữ liệu thất bại
    }
}

echo json_encode($res); // Trả về client
mysqli_close($conn);
?>
