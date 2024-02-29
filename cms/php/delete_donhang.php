<?php
require_once("server.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy mã hóa đơn từ datasend
    $maHoaDon = $_POST["mahoadon"];

    // Xóa dữ liệu từ bảng chitiethoadon trước
    $sqlDeleteChiTietHoaDon = "DELETE FROM chitiethoadon WHERE MADONHANG = '$maHoaDon'";
    $resultDeleteChiTietHoaDon = mysqli_query($conn, $sqlDeleteChiTietHoaDon);

    // Tiếp theo, xóa dữ liệu từ bảng donhang
    $sqlDeleteDonHang = "DELETE FROM donhang WHERE MADONHANG = '$maHoaDon'";
    $resultDeleteDonHang = mysqli_query($conn, $sqlDeleteDonHang);

    if ($resultDeleteChiTietHoaDon && $resultDeleteDonHang) {
        $res["success"] = 1; // Xóa thành công
    } else {
        $res["success"] = 0; // Xóa thất bại
    }

    echo json_encode($res);
    mysqli_close($conn);
} else {
    // Trường hợp không phải là method POST
    $res["success"] = 0; // Gửi thông báo lỗi
    echo json_encode($res);
}
?>
