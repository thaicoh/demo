<?php
require_once("server.php");

$mang = array();

$sql = mysqli_query($conn, "SELECT MAKND FROM `khunghiduong`");

while ($rows = mysqli_fetch_array($sql)) {
    // Lấy giá trị MAKND từ cột trong bảng
    $ma_khach_hang = $rows['MAKND'];

    // Tạo một mảng tạm thời chứa thông tin của mỗi khách hàng
    $usertemp = array(
        'MAKND' => $ma_khach_hang
    );

    // Thêm thông tin của mỗi khách hàng vào mảng chính
    $mang[] = $usertemp;
}

// Tạo một mảng chứa tất cả thông tin khách hàng
$jsonData['res'] = $mang;

// Xuất dữ liệu dưới dạng JSON
echo json_encode($jsonData);

// Đóng kết nối với cơ sở dữ liệu
mysqli_close($conn);
?>
