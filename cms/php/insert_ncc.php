<?php
require_once("server.php");

$mancc = $_POST["mancc"];
$tenncc = $_POST["tenncc"];
$diachincc = $_POST["diachincc"];
$emailncc = $_POST["emailncc"];
$sdtncc = $_POST["sdtncc"];

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM nhacungcap WHERE MANCC='" . $mancc . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Trả về client trùng dữ liệu
} else {
    $sql = "INSERT INTO nhacungcap(MANCC, TENNCC, DIACHINCC, EMAILNCC, SDTNCC) VALUES ('" . $mancc . "','" . $tenncc . "','" . $diachincc . "','" . $emailncc . "','" . $sdtncc . "')";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $res["success"] = 1; // Thành công
        } else {
            $res["success"] = 0; // Thất bại
        }
    } else {
        $res["success"] = 0; // Thất bại
    }
}

echo json_encode($res);
mysqli_close($conn);
