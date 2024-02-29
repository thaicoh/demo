<?php
// API PHP để truy xuất thông tin từ bảng hoa và trả về cho client
require_once("server.php");

$sql = "SELECT `MAHOA`, `MALOAIHOA`, `MAKHUYENMAI`, `TENHOA`, `GIAHOA`, `ANHHOA`, `MOTAHOA`, `SOLUONGCON` FROM `hoa`";
$rs = mysqli_query($conn, $sql);
$mang = array();

while ($rows = mysqli_fetch_array($rs)) {
    $usertemp['MAHOA'] = $rows['MAHOA'];
    $usertemp['MALOAIHOA'] = $rows['MALOAIHOA'];
    $usertemp['MAKHUYENMAI'] = $rows['MAKHUYENMAI'];
    $usertemp['TENHOA'] = $rows['TENHOA'];
    $usertemp['GIAHOA'] = $rows['GIAHOA'];
    $usertemp['ANHHOA'] = $rows['ANHHOA'];
    $usertemp['MOTAHOA'] = $rows['MOTAHOA'];
    $usertemp['SOLUONGCON'] = $rows['SOLUONGCON'];

    array_push($mang, $usertemp);
}

$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
?>
