<?php
require_once("server.php");

// Kiểm tra xem biến $_POST['malh'] đã được gửi từ form chưa
if(isset($_POST["malh"])) {
    // Lấy giá trị của biến $_POST['malh'] và làm sạch nó trước khi sử dụng
    $maQuocGia = mysqli_real_escape_string($conn, $_POST["malh"]);

    // Kiểm tra kết nối đến cơ sở dữ liệu
    if ($conn) {
        // Sử dụng câu lệnh truy vấn để xóa quốc gia dựa trên MAQUOCGIA
        $sql = "DELETE FROM quocgia WHERE MAQUOCGIA='" . $maQuocGia . "'";
        
        // Thực thi truy vấn
        if (mysqli_query($conn, $sql)) {
            // Kiểm tra xem có bản ghi nào bị ảnh hưởng không
            if (mysqli_affected_rows($conn) > 0) {
                $res["success"] = 1; // Xóa dữ liệu thành công
            } else {
                $res["success"] = 0; // Không có bản ghi nào bị xóa
            }
        } else {
            $res["success"] = 0; // Xóa dữ liệu thất bại
        }

        echo json_encode($res); // Trả về kết quả cho client
        mysqli_close($conn); // Đóng kết nối
    } else {
        // Trường hợp không thể kết nối đến cơ sở dữ liệu
        $res["success"] = 0;
        echo json_encode($res);
    }
} else {
    // Trường hợp không có mã quốc gia được gửi
    $res["success"] = 0;
    echo json_encode($res);
}
?>
