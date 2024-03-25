<?php

require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

// Thực hiện truy vấn kết hợp
$sql = mysqli_query($conn, "SELECT khunghiduong.MAKND, quocgia.TENQUOCGIA, loaihinh.TENLOAIHINH, khunghiduong.TENKND,khunghiduong.MAQUOCGIA,khunghiduong.MALOAIHINH , khunghiduong.MOTAKND, khunghiduong.DIACHIKND, khunghiduong.ANHKND 
                            FROM khunghiduong 
                            INNER JOIN quocgia ON khunghiduong.MAQUOCGIA = quocgia.MAQUOCGIA
                            INNER JOIN loaihinh ON khunghiduong.MALOAIHINH = loaihinh.MALOAIHINH
                            WHERE (khunghiduong.TENKND LIKE '%" . $search . "%' OR khunghiduong.MAKND LIKE '%" . $search . "%') 
                            ORDER BY khunghiduong.MAKND ASC " . $limit);

// Đếm tổng số kết quả
$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khunghiduong  
                            WHERE (TENKND LIKE '%" . $search . "%' OR MAKND LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $kndTemp['MAKND'] = $rows['MAKND'];
    $kndTemp['TENQUOCGIA'] = $rows['TENQUOCGIA'];
    $kndTemp['TENLOAIHINH'] = $rows['TENLOAIHINH'];
    $kndTemp['MAQUOCGIA'] = $rows['MAQUOCGIA'];
    $kndTemp['MALOAIHINH'] = $rows['MALOAIHINH'];
    $kndTemp['TENKND'] = $rows['TENKND'];
    $kndTemp['MOTAKND'] = $rows['MOTAKND'];
    $kndTemp['DIACHIKND'] = $rows['DIACHIKND'];
    $kndTemp['ANHKND'] = $rows['ANHKND'];

    array_push($mang, $kndTemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
