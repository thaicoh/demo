<?php
require_once("server.php");

$res = []; // Khởi tạo mảng kết quả

// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy các giá trị từ biểu mẫu
    $maKND = $_POST["maKND"];
    $tenKND = $_POST["tenKND"];
    $diaChiKND = $_POST["diaChiKND"];
    $moTaKND = $_POST["moTaKND"];
    $maQuocGia = $_POST["maQuocGia"];
    $maLoaiHinh = $_POST["maLoaiHinh"];

    // Kiểm tra sự tồn tại của mã khách hàng trong cơ sở dữ liệu
    $rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khunghiduong WHERE MAKND='" . $maKND . "'");
    $row = mysqli_fetch_array($rs);

    if ((int) $row['total'] > 0) {
        $res["success"] = 2; // Trả về client trùng dữ liệu
        $res["mess"] = "trung du lieu"; // Trả về client trùng dữ liệu
    } else {
        // Kiểm tra xem có tệp tin được tải lên không
        if ($_FILES["uploadInput"]["error"] == UPLOAD_ERR_OK) {
            // Xử lý tệp tin tải lên ở đây
            $file_name = $_FILES["uploadInput"]["name"];
            $file_tmp = $_FILES["uploadInput"]["tmp_name"];
            $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $target_file = "../../AnhKND/" . $maKND . "." . $imageFileType;

            // Di chuyển tệp tin vào thư mục mong muốn
            if (move_uploaded_file($file_tmp, $target_file)) {
                // Trường hợp thành công, gửi về mã 1
                $res['status'] = 1;
                $res['message'] = "File uploaded successfully.";
                $res['file_name'] = $file_name;
                $res['file_tmp'] = $file_tmp;
                $res['imageFileType'] = $imageFileType;
                $res['img'] = "AnhKND/" . $maKND . "." . $imageFileType;

                // Thực hiện câu lệnh INSERT vào cơ sở dữ liệu
                $sql = "INSERT INTO khunghiduong(MAKND, TENKND, DIACHIKND, MOTAKND, ANHKND, MAQUOCGIA, MALOAIHINH) VALUES ('" . $maKND . "','" . $tenKND . "','" . $diaChiKND . "','" . $moTaKND ."','" . $res['img'] . "','" . $maQuocGia . "','" . $maLoaiHinh . "')";

                if (mysqli_query($conn, $sql)) {
                    if (mysqli_affected_rows($conn) > 0) {
                        $res["success"] = 1; // Thành công
                        $res["mess"] = "lưu vào db thanh công"; // Thành công
                    } else {
                        $res["success"] = 0; // Thất bại
                        $res["mess"] = "lưu vào db thất bại";
                    }
                } else {
                    $res["success"] = 0; // Thất bại
                    $res["mess"] = "lưu vào db thất bại";
                }
            } else {
                // Trường hợp di chuyển không thành công, gửi về mã 2
                $res['status'] = 2;
                $res['message'] = "thấy file nhưng không lưu vào server được.";
            }
        } else {
            $res['status'] = 0;
            $res['mess'] = "Không có file ảnh!";

            // Thực hiện câu lệnh INSERT vào cơ sở dữ liệu
            $sql = "INSERT INTO khunghiduong(MAKND, TENKND, DIACHIKND, MOTAKND, ANHKND, MAQUOCGIA, MALOAIHINH) VALUES ('" . $maKND . "','" . $tenKND . "','" . $diaChiKND . "','" . $moTaKND ."','" . "" . "','" . $maQuocGia . "','" . $maLoaiHinh . "')";
            if (mysqli_query($conn, $sql)) {
                if (mysqli_affected_rows($conn) > 0) {
                    $res["success"] = 1; // Thành công
                    $res["mess"] = "lưu vào db thanh công, nhưng không lưu ảnh"; // Thành công
                } else {
                    $res["success"] = 0; // Thất bại
                    $res["mess"] = "lưu vào db thất bại";
                }
            } else {
                $res["success"] = 0; // Thất bại
                $res["mess"] = "lưu vào db thất bại";   
            }
        }
    }
} else {
    $res['status'] = 0;
    $res['mess'] = "Không nhận được dữ liệu từ form gửi lên!";
}

echo json_encode($res); // Trả về kết quả dưới dạng JSON

mysqli_close($conn); // Đóng kết nối cơ sở dữ liệu
