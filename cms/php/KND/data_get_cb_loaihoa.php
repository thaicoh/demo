<?php
//api php lấy tất cả thông tin trả về client
require_once("server.php");
$sql = "SELECT `MALOAIHOA`,`TENLOAIHOA`,`MOTALOAIHOA`,`ANHLOAIHOA` FROM `loaihoa`";
$rs = mysqli_query($conn, $sql);
$mang = array();
while ($rows = mysqli_fetch_array($rs)) {
	$usertemp['MALOAIHOA'] = $rows['MALOAIHOA'];
	$usertemp['TENLOAIHOA'] = $rows['TENLOAIHOA'];
	$usertemp['MOTALOAIHOA'] = $rows['MOTALOAIHOA'];
	$usertemp['ANHLOAIHOA'] = $rows['ANHLOAIHOA'];
	array_push($mang, $usertemp);
}
$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
