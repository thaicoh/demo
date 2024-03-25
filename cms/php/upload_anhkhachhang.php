<?php
$res = [];
// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có tệp tin được tải lên không
    if (isset($_FILES["uploadInput"])) {
        // Xử lý tệp tin tải lên ở đây
        //$maKH = $_POST["maKH"];
        $file_name = $_FILES["uploadInput"]["name"];
        $file_tmp = $_FILES["uploadInput"]["tmp_name"];
        $makh = $_POST['malh'];
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));


        // Di chuyển tệp tin vào thư mục mong muốn
        if (move_uploaded_file($file_tmp, "../AnhKhachHang/"  .$makh. ".". $imageFileType)) {
            // Trường hợp thành công, gửi về mã 1
            $res['status'] = 1;
            $res['message'] = "File uploaded successfully.";
            $res['file_name'] = $_FILES["uploadInput"]["name"];
            $res['file_tmp'] = $_FILES["uploadInput"]["tmp_name"];
            $res['imageFileType'] = $imageFileType;
            $res['img'] = "AnhKhachHang/"  .$makh. ".". $imageFileType;
        } else {
            // Trường hợp di chuyển không thành công, gửi về mã 2
            $res['status'] = 2;
            $res['message'] = "Sorry, there was an error uploading your file.";
        }
    } else {
        $res['status'] = 0;
        $res['mess'] = "Không có file ảnh!";
    }
} else {
    $res['status'] = 0;
    $res['mess'] = "Không nhận được dữ liệu từ form gửi lên!";
}
echo json_encode($res);
