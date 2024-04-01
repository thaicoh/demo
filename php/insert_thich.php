<?php
require_once("server.php");

// Nhận dữ liệu "makh" và "maknd" từ client
$makh = $_POST['makh'];
$maknd = $_POST['maknd'];

// Kiểm tra xem dữ liệu đã tồn tại trong bảng thích hay chưa
$sql_check = "SELECT * FROM thich WHERE MAKH = '$makh' AND MAKND = '$maknd'";
$result_check = $conn->query($sql_check);

$res = [];
// Nếu có dữ liệu trùng lặp, thực hiện xóa
if ($result_check->num_rows > 0) {
    $sql_delete = "DELETE FROM thich WHERE MAKH = '$makh' AND MAKND = '$maknd'";
    if ($conn->query($sql_delete) === TRUE) {
        $res['status'] = 1;
        $res['mess'] = "Xóa dữ liệu thành công";
    } else {
        echo "Lỗi khi xóa dữ liệu: " . $conn->error;
        $res['status'] = 0;
        $res['mess'] = "Lỗi khi xóa dữ liệu";
    }
} else {
    // Nếu không có dữ liệu trùng lặp, thực hiện thêm vào bảng
    $sql_insert = "INSERT INTO thich (MAKH, MAKND) VALUES ('$makh', '$maknd')";
    if ($conn->query($sql_insert) === TRUE) {
        $res['status'] = 2;
        $res['mess'] = "Thêm dữ liệu thành công";
    } else {
        echo "Lỗi khi thêm dữ liệu: " . $conn->error;
        $res['status'] = 0;
        $res['mess'] = "Lỗi khi thêm dữ liệu";
    }
}

// Trả về kết quả
echo json_encode($res);

// Đóng kết nối
$conn->close();
?>
