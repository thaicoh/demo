<?php
require_once("server.php");

$mar = $_POST["mar"];
$tenr = $_POST["tenr"];
$knd = $_POST["knd"];
$slp = $_POST["slp"];
$dientich = $_POST["dientich"];
$succhua = $_POST["succhua"];
$diachi = $_POST["diachi"];
$gtd = $_POST["gtd"];
$slg = $_POST["slg"];
$lg = $_POST["lg"];
$mtr = $_POST["mtr"];
$anhKND = $_POST["anh"];

$sql = "UPDATE resort 
        SET MAKND  = '" . $knd . "', TENRESORT = '" . $tenr . "',
            MOTARESORT = '" . $mtr . "', SOLUONGPHONG = '" . $slp . "', DIACHIRESORT  = '" . $diachi . "',
            SOLUONGKHACHTOIDA = '" . $succhua . "',GIATRENDEM  = '" . $gtd . "',DIENTICH  = '" . $dientich . "',
            SOLUONGGIUONG  = '" . $slg . "',LOAIGIUONG  = '" . $lg . "', IMGTHUMP = '" . $anhKND . "' 
        WHERE MARESORT = '" . $mar . "'";

$response = array();

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        $response["success"] = 1; // Thành công
    } else {
        $response["success"] = 0; // Không có bản ghi nào được cập nhật
    }
} else {
    $response["success"] = 0; // Lỗi trong quá trình thực hiện truy vấn
}

echo json_encode($response);
mysqli_close($conn);
