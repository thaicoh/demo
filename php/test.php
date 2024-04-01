<?php
require_once("server.php");

// Kiểm tra xem các dữ liệu từ client đã được gửi và không rỗng
if (isset($_POST['checkin'], $_POST['checkout'], $_POST['soluongphong'], $_POST['soluongnguoi'])) {
    // Nhận dữ liệu gửi từ client
    $maknd = $_POST['maknd'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $soluongphong = $_POST['soluongphong'];
    $soluongnguoi = $_POST['soluongnguoi'];

    // Truy vấn dữ liệu từ bảng datphong để kiểm tra các điều kiện
    $sql = "SELECT *
        FROM resort r
        WHERE r.MAKND = $maknd
            AND NOT EXISTS (
                SELECT 1 
                FROM datphong dp 
                WHERE r.MARESORT = dp.MARESORT 
                    AND ('$checkin' BETWEEN dp.CHECKIN AND dp.CHECKOUT 
                        OR '$checkout' BETWEEN dp.CHECKIN AND dp.CHECKOUT)
            )
            AND r.SOLUONGPHONG >= $soluongphong
            AND r.SOLUONGKHACHTOIDA >= $soluongnguoi";


    $result = $conn->query($sql);

    // Mảng chứa dữ liệu
    $resorts = array();

    // Lấy dữ liệu từ kết quả truy vấn và đưa vào mảng
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resorts[] = $row;
            }
        } else {
            // Trả về thông báo lỗi nếu không có kết quả từ truy vấn
            $response = array(
                "success" => false,
                "message" => "Không tìm thấy kết quả phù hợp"
            );
            echo json_encode($response);
            exit; // Dừng kịch bản PHP ở đây
        }
    } else {
        // Trả về thông báo lỗi nếu truy vấn không thành công
        $response = array(
            "success" => false,
            "message" => "Lỗi truy vấn cơ sở dữ liệu"
        );
        echo json_encode($response);
        exit; // Dừng kịch bản PHP ở đây
    }

    // Trả về dữ liệu dưới dạng JSON
    $response = array(
        "success" => true,
        "data" => $resorts
    );
    echo json_encode($response);
} else {
    // Trả về thông báo lỗi nếu thiếu dữ liệu từ client
    $response = array(
        "success" => false,
        "message" => "Thiếu dữ liệu từ client"
    );
    echo json_encode($response);
}
// Đóng kết nối
$conn->close();
