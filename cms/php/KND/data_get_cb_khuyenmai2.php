<?php
require_once("server.php");

$sql = "SELECT `MALOAIHINH`, `TENLOAIHINH`, `MOTALOAIHINH`, `ANHLOAIHINH`, `titleloaihinh` FROM `loaihinh`";
$rs = mysqli_query($conn, $sql);
$mang = array();

while ($rows = mysqli_fetch_array($rs)) {
    $loaihinh['MALOAIHINH'] = $rows['MALOAIHINH'];
    $loaihinh['TENLOAIHINH'] = $rows['TENLOAIHINH'];
    $loaihinh['MOTALOAIHINH'] = $rows['MOTALOAIHINH'];
    $loaihinh['ANHLOAIHINH'] = $rows['ANHLOAIHINH'];
    $loaihinh['titleloaihinh'] = $rows['titleloaihinh'];
    array_push($mang, $loaihinh);
}

$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
?>
