<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT * FROM `khachhang` WHERE (`TENKH` LIKE '%" . $search . "%' OR `MAKH` LIKE '%" . $search . "%') ORDER BY `MAKH` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `khachhang` WHERE (`TENKH` LIKE '%" . $search . "%' OR `MAKH` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MAKH'] = $rows['MAKH'];
    $usertemp['TENKH'] = $rows['TENKH'];
    $usertemp['SDTKH'] = $rows['SDTKH'];
    $usertemp['EMAILKH'] = $rows['EMAILKH'];
    $usertemp['MATKHAUKH'] = $rows['MATKHAUKH'];
    $usertemp['ANHKH'] = $rows['ANHKH'];
    $usertemp['GIOITINH'] = $rows['GIOITINH'];
    $usertemp['VAITRO'] = $rows['VAITRO'];
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
