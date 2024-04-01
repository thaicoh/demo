<?php
require_once("server.php");

// Truy vấn dữ liệu từ bảng khunghiduong
$sql = "SELECT * FROM khunghiduong";
$result = $conn->query($sql);

// Mảng chứa dữ liệu
$data = array();
$dataknd = array();
$datathich = array();

// Lấy dữ liệu từ kết quả truy vấn và đưa vào mảng
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataknd[] = $row;
        //$data['datathich'] = $makh;
    }
} else {
    // Trả về thông báo lỗi nếu không có kết quả
    $res = array(
        "success" => false,
        "message" => "Không có kết quả từ bảng khunghiduong"
    );
    echo json_encode($res);
}
$data['dataknd'] =  $dataknd;

if ($_POST["makh"] != '') {
    $makh = $_POST["makh"];
    $dataknd = array();

    // Truy vấn dữ liệu từ bảng khunghiduong
    $sql2 = "SELECT * FROM thich WHERE MAKH = '$makh'";
    $result2 = mysqli_query($conn, $sql2);
    // Lấy dữ liệu từ kết quả truy vấn và đưa vào mảng
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $datathich[] = $row;
        }
    } else {
        $datathich[] = [] ;
    }
    $data['datathich'] =  $datathich;
    $data['thich'] =  1;
} else {
    $data['thich'] =  0;
}



// Trả về dữ liệu dưới dạng JSON nếu có kết quả
$res = array(
    "success" => true,
    "data" => $data
);
echo json_encode($res);

//print_r($_POST);

// Đóng kết nối
$conn->close();
