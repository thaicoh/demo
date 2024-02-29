<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT `MAKHUYENMAI`, `TENKHUYENMAI`, `NGAYBATDAU`, `NGAYKETTHUC`, `MOTA`, `TILEKHUYENMAI` FROM `khuyenmai` WHERE (`TENKHUYENMAI` LIKE '%" . $search . "%' OR `MAKHUYENMAI` LIKE '%" . $search . "%') ORDER BY `MAKHUYENMAI` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `khuyenmai` WHERE (`TENKHUYENMAI` LIKE '%" . $search . "%' OR `MAKHUYENMAI` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MAKHUYENMAI'] = $rows['MAKHUYENMAI'];
    $usertemp['TENKHUYENMAI'] = $rows['TENKHUYENMAI'];
    $usertemp['NGAYBATDAU'] = $rows['NGAYBATDAU'];
    $usertemp['NGAYKETTHUC'] = $rows['NGAYKETTHUC'];
    $usertemp['MOTA'] = $rows['MOTA'];
    $usertemp['TILEKHUYENMAI'] = $rows['TILEKHUYENMAI'];
    array_push($mang, $usertemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
