<?php
require_once("server.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu gửi lên từ datasend
    $maHoa = $_POST["mahoa"];
    $soLuongMua = $_POST["soluongmua"];

    // Truy vấn để lấy SOLUONGCON hiện tại từ bảng hoa
    $sqlSelect = "SELECT SOLUONGCON FROM hoa WHERE MAHOA = '$maHoa'";
    $result = mysqli_query($conn, $sqlSelect);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $soLuongHienTai = (int)$row['SOLUONGCON'];
        $soLuongConSauCapNhat = $soLuongHienTai - $soLuongMua;

        // Cập nhật SOLUONGCON trong bảng hoa
        $sqlUpdate = "UPDATE hoa SET SOLUONGCON = $soLuongConSauCapNhat WHERE MAHOA = '$maHoa'";
        
        if (mysqli_query($conn, $sqlUpdate)) {
            $res["success"] = 1; // Cập nhật thành công
        } else {
            $res["success"] = 0; // Cập nhật thất bại
        }
    } else {
        $res["success"] = 0; // Lỗi truy vấn
    }

    echo json_encode($res); // Trả về client
    mysqli_close($conn);
} else {
    // Trường hợp không phải là method POST
    $res["success"] = 0; // Gửi thông báo lỗi
    echo json_encode($res); // Trả về client
}
?>

