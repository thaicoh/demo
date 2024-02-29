<?php
require_once("server.php");

$maDonHang = $_POST["madonhang"];
$maHoa = $_POST["mahoa"];
$soLuong = $_POST["soluong"];
$gia = $_POST["gia"];

// Kiểm tra xem dữ liệu đã tồn tại trong bảng chitiethoadon chưa
$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM chitiethoadon WHERE MADONHANG='" . $maDonHang . "' AND MAHOA='" . $maHoa . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Dữ liệu đã tồn tại
} else {
    // Thêm dữ liệu mới vào bảng chitiethoadon
    $sql = "INSERT INTO chitiethoadon (MADONHANG, MAHOA, SOLUONG, GIA) VALUES ('" . $maDonHang . "', '" . $maHoa . "', '" . $soLuong . "', '" . $gia . "')";

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
