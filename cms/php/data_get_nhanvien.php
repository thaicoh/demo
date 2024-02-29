<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT `MANV`, `TENNV`, `DIACHINV`, `SDTNV`, `GTNV`, `NSNV`, `EMAILNV` FROM `nhanvien` WHERE (`TENNV` LIKE '%" . $search . "%' OR `MANV` LIKE '%" . $search . "%') ORDER BY `MANV` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `nhanvien` WHERE (`TENNV` LIKE '%" . $search . "%' OR `MANV` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MANV'] = $rows['MANV'];
    $usertemp['TENNV'] = $rows['TENNV'];
    $usertemp['DIACHINV'] = $rows['DIACHINV'];
    $usertemp['SDTNV'] = $rows['SDTNV'];
    $usertemp['GTNV'] = $rows['GTNV'];
    $usertemp['NSNV'] = $rows['NSNV'];
    $usertemp['EMAILNV'] = $rows['EMAILNV'];
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
