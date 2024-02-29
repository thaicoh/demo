<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT `MANCC`, `TENNCC`, `DIACHINCC`, `SDTNCC`, `EMAILNCC` FROM `nhacungcap` WHERE (`TENNCC` LIKE '%" . $search . "%' OR `MANCC` LIKE '%" . $search . "%') ORDER BY `MANCC` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `nhacungcap` WHERE (`TENNCC` LIKE '%" . $search . "%' OR `MANCC` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MANCC'] = $rows['MANCC'];
    $usertemp['TENNCC'] = $rows['TENNCC'];
    $usertemp['DIACHINCC'] = $rows['DIACHINCC'];
    $usertemp['SDTNCC'] = $rows['SDTNCC'];
    $usertemp['EMAILNCC'] = $rows['EMAILNCC'];
    array_push($mang, $usertemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
