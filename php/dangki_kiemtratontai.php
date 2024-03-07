<?php
    require_once("server.php");

    // Lấy email được gửi lên từ client
    $gmail = $_POST["gmail"];
    
    // Kiểm tra xem email có tồn tại trong bảng khachhang hay không
    $sql = "SELECT * FROM khachhang WHERE EMAILKH = '$gmail'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) { // Nếu email tồn tại trong bảng
        $res["exists"] = true; // Đánh dấu rằng email tồn tại trong bảng
    } else { // Nếu email không tồn tại trong bảng
        $res["exists"] = false; // Đánh dấu rằng email không tồn tại trong bảng
    }
    
    echo json_encode($res); // Trả về kết quả cho client
    mysqli_close($conn);
?>
