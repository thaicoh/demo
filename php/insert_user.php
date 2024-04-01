    <?php
    require_once("server.php");

    $gmail = $_POST["gmail"];
    $name = $_POST["name"];
    $pass = $_POST["pass"];

    $sql = "INSERT INTO khachhang (TENKH, EMAILKH, MATKHAUKH, vaitro) VALUES ('$name', '$gmail', '$pass', 0)";
    // Thực thi câu lệnh SQL
    if (mysqli_query($conn, $sql)) {
        $res = array("status" => 1, "message" => "Thêm bản ghi mới thành công");
    } else {
        $res = array("status" => 0, "message" => "Lỗi: " . $sql . "<br>" . mysqli_error($conn));
    }

    // Trả về kết quả
    echo json_encode($res);

    // Đóng kết nối
    mysqli_close($conn);
