<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT `MALOAIHOA`, `TENLOAIHOA`, `MOTALOAIHOA`, `ANHLOAIHOA` FROM `loaihoa` WHERE (`TENLOAIHOA` LIKE '%" . $search . "%' OR `MALOAIHOA` LIKE '%" . $search . "%') ORDER BY `MALOAIHOA` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `loaihoa` WHERE (`TENLOAIHOA` LIKE '%" . $search . "%' OR `MALOAIHOA` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MALOAIHOA'] = $rows['MALOAIHOA'];
    $usertemp['TENLOAIHOA'] = $rows['TENLOAIHOA'];
    $usertemp['MOTALOAIHOA'] = $rows['MOTALOAIHOA'];
    $usertemp['ANHLOAIHOA'] = $rows['ANHLOAIHOA'];
    array_push($mang, $usertemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
