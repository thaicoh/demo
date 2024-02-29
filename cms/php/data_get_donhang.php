<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT donhang.*, khachhang.TENKH, nhanvien.TENNV 
                            FROM `donhang` 
                            LEFT JOIN khachhang ON donhang.MAKH = khachhang.MAKH 
                            LEFT JOIN nhanvien ON donhang.MANV = nhanvien.MANV 
                            WHERE (donhang.`MADONHANG` LIKE '%" . $search . "%' 
                                   OR khachhang.`TENKH` LIKE '%" . $search . "%' 
                                   OR nhanvien.`TENNV` LIKE '%" . $search . "%') 
                            ORDER BY donhang.`MADONHANG` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' 
                           FROM `donhang` 
                           LEFT JOIN khachhang ON donhang.MAKH = khachhang.MAKH 
                           LEFT JOIN nhanvien ON donhang.MANV = nhanvien.MANV 
                           WHERE (donhang.`MADONHANG` LIKE '%" . $search . "%' 
                                  OR khachhang.`TENKH` LIKE '%" . $search . "%' 
                                  OR nhanvien.`TENNV` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MADONHANG'] = $rows['MADONHANG'];
    $usertemp['MAKH'] = $rows['MAKH'];
    $usertemp['TENKH'] = $rows['TENKH']; // Thêm thông tin từ bảng khachhang
    $usertemp['MANV'] = $rows['MANV'];
    $usertemp['TENNV'] = $rows['TENNV']; // Thêm thông tin từ bảng nhanvien
    $usertemp['NGAYDAT'] = $rows['NGAYDAT'];
    $usertemp['TONGHOADON'] = $rows['TONGHOADON'];
    $usertemp['GHICHU'] = $rows['GHICHU'];
    array_push($mang, $usertemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
