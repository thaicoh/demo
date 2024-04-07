<?php
require_once("server.php");

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$tongtien = $_POST['tongtien'];
$maresort = $_POST["maresort"];
$makh = $_POST["makh"];
$sl = $_POST["soluongnguoi"];


$sql = "INSERT INTO datphong (MARESORT, MAKH , CHECKIN, CHECKOUT, SOLUONGNGUOI, TONGTIEN) VALUES ('$maresort', '$makh', '$checkin',  '$checkout', '$sl', '$tongtien')";
// Thực thi câu lệnh SQL
if (mysqli_query($conn, $sql)) {
    $res = array("status" => true, "message" => "Thêm đơn đặt phòng thành công");
} else {
    $res = array("status" => false, "message" => "Không đặt phòng thành công");
}

// Trả về kết quả
echo json_encode($res);

// Đóng kết nối
mysqli_close($conn);
