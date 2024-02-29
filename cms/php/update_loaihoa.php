<?php
require_once("server.php");
$malh = $_POST["malh"];
$tenlh = $_POST["tenlh"];
$mota = $_POST["mota"];
$anh = $_POST["anh"];

$sql = "UPDATE loaihoa SET TENLOAIHOA='" . $tenlh . "', MOTALOAIHOA='" . $mota . "', ANHLOAIHOA='" . $anh . "' WHERE MALOAIHOA='" . $malh . "'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        $res["success"] = 1; //[1]
    } else {
        $res["success"] = 0;
    }
} else {
    $res["success"] = 0; //[0] //that bai
}

echo  json_encode($res); //trà về client {"success":1}
mysqli_close($conn);
