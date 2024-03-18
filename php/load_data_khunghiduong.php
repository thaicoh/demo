<?php
require_once("server.php");

// Truy vấn dữ liệu từ bảng khunghiduong
$sql = "SELECT * FROM khunghiduong";
$result = $conn->query($sql);

// Mảng chứa dữ liệu
$khunghiduongData = array();

// Lấy dữ liệu từ kết quả truy vấn và đưa vào mảng
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $khunghiduongData[] = $row;
    }
} else {
    // Trả về thông báo lỗi nếu không có kết quả
    $response = array(
        "success" => false,
        "message" => "Không có kết quả từ bảng khunghiduong"
    );
    echo json_encode($response);
}

// Trả về dữ liệu dưới dạng JSON nếu có kết quả
$response = array(
    "success" => true,
    "data" => $khunghiduongData
);
echo json_encode($response);

// Đóng kết nối
$conn->close();
