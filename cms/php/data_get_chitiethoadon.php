<?php
require_once("server.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy mã đơn hàng từ datasend
    $maDonHang = $_POST["madonhang"];

    // Truy vấn để lấy thông tin từ bảng chitiethoadon kết hợp bảng hoa
    $sql = "SELECT chitiethoadon.*, hoa.TENHOA 
            FROM chitiethoadon 
            INNER JOIN hoa ON chitiethoadon.MAHOA = hoa.MAHOA 
            WHERE chitiethoadon.MADONHANG = '$maDonHang'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Khởi tạo mảng để lưu thông tin các chi tiết hóa đơn kèm tên hoa
        $chitietHoaDon = array();

        while ($row = mysqli_fetch_assoc($result)) {
            // Thêm thông tin chi tiết hóa đơn vào mảng
            $chitietHoaDon[] = $row;
        }

        // Trả về mảng thông tin chi tiết hóa đơn kèm tên hoa
        echo json_encode($chitietHoaDon);
    } else {
        $res["success"] = 0; // Lỗi truy vấn
        echo json_encode($res);
    }

    mysqli_close($conn);
} else {
    // Trường hợp không phải là method POST
    $res["success"] = 0; // Gửi thông báo lỗi
    echo json_encode($res);
}
?>
