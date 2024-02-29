<?php
require_once("server.php");

$response = array();

$sql = "SELECT `MANV`,`TENNV`,`DIACHINV`,`SDTNV`,`GTNV`,`NSNV`,`EMAILNV` FROM `nhanvien`";
$rs = mysqli_query($conn, $sql);

if ($rs) {
    $mang = array();
    while ($rows = mysqli_fetch_array($rs)) {
        $usertemp['MANV'] = $rows['MANV'];
        $usertemp['TENNV'] = $rows['TENNV'];
        $usertemp['DIACHINV'] = $rows['DIACHINV'];
        $usertemp['SDTNV'] = $rows['SDTNV'];
        $usertemp['GTNV'] = $rows['GTNV'];
        $usertemp['NSNV'] = $rows['NSNV'];
        $usertemp['EMAILNV'] = $rows['EMAILNV'];
        array_push($mang, $usertemp);
    }

    $response['items'] = $mang;
} else {
    $response['error'] = mysqli_error($conn);
}

echo json_encode($response);
mysqli_close($conn);
?>
