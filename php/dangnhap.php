<?php
require_once("server.php");

// Lấy giá trị từ POST
$gmail = $_POST["gmail"];
$pass = $_POST["pass"];

// Truy vấn SQL để kiểm tra email và mật khẩu
$sql = "SELECT * FROM khachhang WHERE EMAILKH = '$gmail' AND MATKHAUKH = '$pass'";
$result = mysqli_query($conn, $sql);

// Khởi tạo mảng kết quả
$res = array();

// Kiểm tra xem có bản ghi nào trả về từ truy vấn hay không
if (mysqli_num_rows($result) > 0) {
    // Email và mật khẩu đúng
    $row = mysqli_fetch_assoc($result);
    $res["status"] = ($row["vaitro"] == 1) ? 2 : 1; // Vaitro = 1 -> status = 2, ngược lại status = 1
    $res["message"] = "Đăng nhập thành công!";
} else {
    // Email hoặc mật khẩu không đúng
    $res["status"] = 0;
    $res["message"] = "Sai email hoặc mật khẩu!";
}

// Trả về kết quả dưới dạng JSON
echo json_encode($res);

// Đóng kết nối
mysqli_close($conn);
