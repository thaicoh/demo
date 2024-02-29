<?php
require_once("server.php");

$mancc = $_POST["mancc"];
$tenncc = $_POST["tenncc"];
$diachincc = $_POST["diachincc"];
$emailncc = $_POST["emailncc"];
$sdtncc = $_POST["sdtncc"];

$sql = "UPDATE nhacungcap SET TENNCC='" . $tenncc . "', DIACHINCC='" . $diachincc . "', EMAILNCC='" . $emailncc . "', SDTNCC='" . $sdtncc . "' WHERE MANCC='" . $mancc . "'";

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        $res["success"] = 1; // Thành công
    } else {
        $res["success"] = 0; // Thất bại
    }
} else {
    $res["success"] = 0; // Thất bại
}

echo json_encode($res); // Trả về kết quả cho client
mysqli_close($conn);
