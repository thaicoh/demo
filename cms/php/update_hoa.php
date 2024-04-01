<?php
require_once("server.php");

$maKND = $_POST["maKND"];
$maQuocGia = $_POST["maQuocGia"];
$maLoaiHinh = $_POST["maLoaiHinh"];
$tenKND = $_POST["tenKND"];
$moTaKND = $_POST["moTaKND"];
$diaChiKND = $_POST["diaChiKND"];
$anhKND = $_POST["anhKND"];

$sql = "UPDATE khunghiduong 
        SET MAQUOCGIA = '" . $maQuocGia . "', MALOAIHINH = '" . $maLoaiHinh . "', 
            TENKND = '" . $tenKND . "',
            MOTAKND = '" . $moTaKND . "', DIACHIKND = '" . $diaChiKND . "', ANHKND = '" . $anhKND . "' 
        WHERE MAKND = '" . $maKND . "'";

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
