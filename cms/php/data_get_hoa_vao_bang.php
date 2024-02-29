<?php
require_once("server.php");

$mang = array();
$record = $_POST['record']; // Số dòng trả về để client xem
$page = $_POST['page']; // Trang hiện tại
$search = $_POST['search'];
$vt = $page * $record;
$limit = 'LIMIT ' . $vt . ' , ' . $record;

$sql = mysqli_query($conn, "SELECT h.`MAHOA`, h.`TENHOA`, h.`ANHHOA`, h.`MOTAHOA`, h.`GIAHOA`, h.`SOLUONGCON`, h.`MALOAIHOA`, h.`MAKHUYENMAI`, lh.`TENLOAIHOA`, km.`TENKHUYENMAI` 
                            FROM `hoa` h 
                            LEFT JOIN `loaihoa` lh ON h.`MALOAIHOA` = lh.`MALOAIHOA`
                            LEFT JOIN `khuyenmai` km ON h.`MAKHUYENMAI` = km.`MAKHUYENMAI`
                            WHERE (h.`TENHOA` LIKE '%" . $search . "%' OR h.`MAHOA` LIKE '%" . $search . "%') 
                            ORDER BY h.`MAHOA` ASC " . $limit);

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM `hoa` WHERE (`TENHOA` LIKE '%" . $search . "%' OR `MAHOA` LIKE '%" . $search . "%')");

while ($rows = mysqli_fetch_array($sql)) {
    $usertemp['MAHOA'] = $rows['MAHOA'];
    $usertemp['TENHOA'] = $rows['TENHOA'];
    $usertemp['ANHHOA'] = $rows['ANHHOA'];
    $usertemp['MOTAHOA'] = $rows['MOTAHOA'];
    $usertemp['GIAHOA'] = $rows['GIAHOA'];
    $usertemp['SOLUONGCON'] = $rows['SOLUONGCON'];
    $usertemp['MALOAIHOA'] = $rows['MALOAIHOA'];
    $usertemp['MAKHUYENMAI'] = $rows['MAKHUYENMAI'];
    $usertemp['TENLOAIHOA'] = $rows['TENLOAIHOA'];
    $usertemp['TENKHUYENMAI'] = $rows['TENKHUYENMAI'];
    array_push($mang, $usertemp);
}

$row = mysqli_fetch_array($rs);
$jsonData['total'] = (int)$row['total'];
$jsonData['totalpage'] = ceil($row['total'] / $record);
$jsonData['page'] = (int)$page;
$jsonData['items'] = $mang;

echo json_encode($jsonData);
mysqli_close($conn);
