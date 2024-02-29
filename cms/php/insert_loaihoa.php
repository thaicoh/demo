<?php
require_once("server.php");
$malh = $_POST["maloaihoa"];
$tenlh = $_POST["tenloaihoa"];
$anhlh = $_POST["anhloaihoa"];
$motalh = $_POST["motaloaihoa"];

$rs = mysqli_query($conn, "select COUNT(*) as 'total' from loaihoa where MALOAIHOA='" . $malh . "' ");
$row = mysqli_fetch_array($rs);
if ((int)$row['total'] > 0) {
    $res["success"] = 2; //trả về client trùng dữ liệu
} else {
    $sql = "insert into loaihoa(MALOAIHOA,TENLOAIHOA,MOTALOAIHOA,ANHLOAIHOA) values('" . $malh . "','" . $tenlh . "','" . $motalh . "','" . $anhlh . "')";
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $res["success"] = 1; //[1]
        } else {
            $res["success"] = 0; //[0] //that bai
        }
    } else {
        $res["success"] = 0; //{success:0}  //that bai
    }
}
echo  json_encode($res); //trà về client {"success":1}
mysqli_close($conn);
