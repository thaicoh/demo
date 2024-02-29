<?php
//api php lấy tất cả thông tin trả về client
require_once("server.php");
$manxb = $_POST["makhuyenmai"];
$sql = "SELECT * FROM `khuyenmai` where MAKHUYENMAI='" . $manxb . "'";
$rs = mysqli_query($conn, $sql);
$mang = array();
while ($rows = mysqli_fetch_array($rs)) {
    $usertemp['MAKHUYENMAI'] = $rows['MAKHUYENMAI'];
    $usertemp['NGAYBATDAU'] = $rows['NGAYBATDAU'];
    $usertemp['NGAYKETTHUC'] = $rows['NGAYKETTHUC'];
    $usertemp['MOTA'] = $rows['MOTA'];
    $usertemp['TILEKHUYENMAI'] = $rows['TILEKHUYENMAI'];
    $usertemp['TENKHUYENMAI'] = $rows['TENKHUYENMAI'];
    array_push($mang, $usertemp);
}
$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
