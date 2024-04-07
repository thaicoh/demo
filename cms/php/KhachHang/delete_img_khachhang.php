<?php
// Đường dẫn đến thư mục chứa ảnh khách hàng
$directory = "../AnhKhachHang/";

// Lấy giá trị mã khách hàng từ POST
$maKH = $_POST['maKH'];

// Kiểm tra nếu thư mục tồn tại
if (is_dir($directory)) {
    // Mở thư mục
    if ($dh = opendir($directory)) {
        // Lặp qua tất cả các tệp trong thư mục
        while (($file = readdir($dh)) !== false) {
            // Kiểm tra xem tệp có phải là một tệp ảnh và tên tệp bắt đầu bằng mã khách hàng hay không
            if (preg_match('/\.(jpg|jpeg|png|gif)$/', $file) && strpos($file, $makh) === 0) {
                // Xóa tệp
                unlink($directory . $file);
            }
        }
        // Đóng thư mục
        closedir($dh);
    }
}
?>
