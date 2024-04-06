<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT `MAQUOCGIA`, `TENQUOCGIA`, `GIOITHIEUQUOCGIA`, `ANHQUOCGIA` FROM `quocgia` WHERE (`TENQUOCGIA` LIKE '%" . $search . "%' OR `MAQUOCGIA` LIKE '%" . $search . "%') ORDER BY `MAQUOCGIA` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `quocgia` WHERE (`TENQUOCGIA` LIKE '%" . $search . "%' OR `MAQUOCGIA` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $quocgiaTemp['MAQUOCGIA'] = $rows['MAQUOCGIA'];
    $quocgiaTemp['TENQUOCGIA'] = $rows['TENQUOCGIA'];
    $quocgiaTemp['GIOITHIEUQUOCGIA'] = $rows['GIOITHIEUQUOCGIA'];
    $quocgiaTemp['ANHQUOCGIA'] = $rows['ANHQUOCGIA'];
    array_push($mang, $quocgiaTemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
?>
