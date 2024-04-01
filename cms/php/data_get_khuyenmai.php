<?php
//api php lấy tất cả thông tin trả về client
require_once("server.php");
$manxb = $_POST["maqg"];
$sql = "SELECT * FROM `quocgia` where MAQUOCGIA='" . $manxb . "'";
$rs = mysqli_query($conn, $sql);
$mang = array();
while ($rows = mysqli_fetch_array($rs)) {
    $quocgiaTemp['MAQUOCGIA'] = $rows['MAQUOCGIA'];
    $quocgiaTemp['TENQUOCGIA'] = $rows['TENQUOCGIA'];
    $quocgiaTemp['GIOITHIEUQUOCGIA'] = $rows['GIOITHIEUQUOCGIA'];
    $quocgiaTemp['ANHQUOCGIA'] = $rows['ANHQUOCGIA'];
    array_push($mang, $quocgiaTemp);
}
$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
