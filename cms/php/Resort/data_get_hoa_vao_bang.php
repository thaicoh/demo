<?php

require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;


// Thực hiện truy vấn
$sql = mysqli_query($conn, "SELECT resort.*, khunghiduong.TENKND 
                            FROM resort 
                            INNER JOIN khunghiduong ON resort.MAKND = khunghiduong.MAKND
                            WHERE (resort.TENRESORT LIKE '%" . $search . "%' OR resort.MAKND LIKE '%" . $search . "%') 
                            ORDER BY resort.MAKND ASC " . $limit);

// Đếm tổng số kết quả
$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM resort  
                            WHERE (TENRESORT LIKE '%" . $search . "%' OR MAKND LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $resortTemp['MAKND'] = $rows['MAKND'];
    $resortTemp['TENKND'] = $rows['TENKND'];
    $resortTemp['TENRESORT'] = $rows['TENRESORT'];
    $resortTemp['MOTARESORT'] = $rows['MOTARESORT'];
    $resortTemp['SOLUONGPHONG'] = $rows['SOLUONGPHONG'];
    $resortTemp['SOLUONGKHACHTOIDA'] = $rows['SOLUONGKHACHTOIDA'];
    $resortTemp['DIACHIRESORT'] = $rows['DIACHIRESORT'];
    $resortTemp['GIATRENDEM'] = $rows['GIATRENDEM'];
    $resortTemp['DIENTICH'] = $rows['DIENTICH'];
    $resortTemp['SOLUONGGIUONG'] = $rows['SOLUONGGIUONG'];
    $resortTemp['LOAIGIUONG'] = $rows['LOAIGIUONG'];
    $resortTemp['IMGTHUMP'] = $rows['IMGTHUMP'];

    array_push($mang, $resortTemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
