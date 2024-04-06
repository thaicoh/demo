<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT `MALOAIHINH`, `TENLOAIHINH`, `MOTALOAIHINH`, `ANHLOAIHINH`, `titleloaihinh` FROM `loaihinh` WHERE (`TENLOAIHINH` LIKE '%" . $search . "%' OR `MALOAIHINH` LIKE '%" . $search . "%') ORDER BY `MALOAIHINH` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `loaihinh` WHERE (`TENLOAIHINH` LIKE '%" . $search . "%' OR `MALOAIHINH` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MALOAIHINH'] = $rows['MALOAIHINH'];
    $usertemp['TENLOAIHINH'] = $rows['TENLOAIHINH'];
    $usertemp['MOTALOAIHINH'] = $rows['MOTALOAIHINH'];
    $usertemp['ANHLOAIHINH'] = $rows['ANHLOAIHINH'];
    $usertemp['titleloaihinh'] = $rows['titleloaihinh'];
    array_push($mang, $usertemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
?>
