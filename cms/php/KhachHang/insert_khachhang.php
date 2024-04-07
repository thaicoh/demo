<?php
require_once ("server.php");

$res = []; // Khởi tạo mảng kết quả

// Kiểm tra xem có dữ liệu được gửi từ biểu mẫu không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy các giá trị từ biểu mẫu
    $maKH = $_POST["maKH"];
    $tenKH = $_POST["tenKH"];
    $sdtKH = $_POST["sdtKH"];
    $emailKH = trim($_POST['emailKH']);
    $matKhauKH = $_POST["matKhauKH"];
    $gioiTinh = $_POST["gioiTinh"];
    $vaiTro = 0;

    // Kiểm tra sự tồn tại của mã khách hàng trong cơ sở dữ liệu
    $rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khachhang WHERE MAKH='" . $maKH . "'");
    $rs1 = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khachhang WHERE SDTKH='" . $sdtKH . "'");
    $rs2 = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khachhang WHERE EMAILKH='" . $emailKH . "'");
    $row = mysqli_fetch_array($rs);
    $row1 = mysqli_fetch_array($rs1);
    $row2 = mysqli_fetch_array($rs2);

    if ((int) $row['total'] > 0 && (int) $row1['total'] > 0 && (int) $row2['total'] > 0) {
        $res["success"] = 2; // Both MAKH and SDTKH are duplicate
    } elseif ((int) $row['total'] > 0) {
        $res["success"] = 3; // Only MAKH is duplicate
    } elseif ((int) $row1['total'] > 0) {
        $res["success"] = 4; // Only SDTKH is duplicate
    } elseif ((int) $row2['total'] > 0) {
        $res["success"] = 5; // Only EMAILKH is duplicate
    } else {
        // Kiểm tra xem có tệp tin được tải lên không
        if ($_FILES["uploadInput"]["error"] == UPLOAD_ERR_OK) {
            // Xử lý tệp tin tải lên ở đây
            $file_name = $_FILES["uploadInput"]["name"];
            $file_tmp = $_FILES["uploadInput"]["tmp_name"];
            $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $target_file = "../../AnhKhachHang/" . $maKH . "." . $imageFileType;

            // Di chuyển tệp tin vào thư mục mong muốn
            if (move_uploaded_file($file_tmp, $target_file)) {
                // Trường hợp thành công, gửi về mã 1
                $res['status'] = 1;
                $res['message'] = "File uploaded successfully.";
                $res['file_name'] = $file_name;
                $res['file_tmp'] = $file_tmp;
                $res['imageFileType'] = $imageFileType;
                $res['img'] = "AnhKhachHang/" . $maKH . "." . $imageFileType;

                // Thực hiện câu lệnh INSERT vào cơ sở dữ liệu
                $sql = "INSERT INTO khachhang(MAKH, TENKH, SDTKH, EMAILKH, MATKHAUKH, ANHKH, GIOITINH, VAITRO) VALUES ('" . $maKH . "','" . $tenKH . "','" . $sdtKH . "','" . $emailKH . "','" . $matKhauKH . "','" . $res['img'] . "','" . $gioiTinh . "','" . $vaiTro . "')";
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
            $sql = "INSERT INTO khachhang(MAKH, TENKH, SDTKH, EMAILKH, MATKHAUKH, ANHKH, GIOITINH, VAITRO) VALUES ('" . $maKH . "','" . $tenKH . "','" . $sdtKH . "','" . $emailKH . "','" . $matKhauKH . "','" . "" . "','" . $gioiTinh . "','" . $vaiTro . "')";
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
