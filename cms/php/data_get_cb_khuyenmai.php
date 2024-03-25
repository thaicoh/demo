<?php
require_once("server.php");

$sql = "SELECT `MAQUOCGIA`, `TENQUOCGIA`, `GIOITHIEUQUOCGIA`, `ANHQUOCGIA` FROM `quocgia`";
$rs = mysqli_query($conn, $sql);
$mang = array();

while ($rows = mysqli_fetch_array($rs)) {
    $quocgia = array(
        "MAQUOCGIA" => $rows['MAQUOCGIA'],
        "TENQUOCGIA" => $rows['TENQUOCGIA'],
        "GIOITHIEUQUOCGIA" => $rows['GIOITHIEUQUOCGIA'],
        "ANHQUOCGIA" => $rows['ANHQUOCGIA']
    );
    array_push($mang, $quocgia);
}

$jsondata['items'] = $mang;
echo json_encode($jsondata);
mysqli_close($conn);
?>
