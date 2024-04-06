<?php
require_once("server.php");

$sql = "SELECT `MAQUOCGIA`, `TENQUOCGIA`, `GIOITHIEUQUOCGIA`, `ANHQUOCGIA` FROM `quocgia`";
$rs = mysqli_query($conn, $sql);
$mang = array();

while ($rows = mysqli_fetch_array($rs)) {
    $quocgia['MAQUOCGIA'] = $rows['MAQUOCGIA'];
    $quocgia['TENQUOCGIA'] = $rows['TENQUOCGIA'];
    $quocgia['GIOITHIEUQUOCGIA'] = $rows['GIOITHIEUQUOCGIA'];
    $quocgia['ANHQUOCGIA'] = $rows['ANHQUOCGIA'];
    array_push($mang, $quocgia);
}

$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
?>

