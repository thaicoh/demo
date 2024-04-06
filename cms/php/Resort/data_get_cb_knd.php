<?php
// API PHP để truy xuất thông tin từ bảng hoa và trả về cho client
require_once("server.php");

$sql = "SELECT * FROM `khunghiduong`";
$rs = mysqli_query($conn, $sql);
$mang = array();

while ($rows = mysqli_fetch_array($rs)) {
    $usertemp['MAKND'] = $rows['MAKND'];
    $usertemp['TENKND'] = $rows['TENKND'];

    array_push($mang, $usertemp);
}

$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
