<?php
require_once("server.php");

$makm = $_POST["makm"];
$ngaybatdau = $_POST["ngaybatdau"];
$ngayketthuc = $_POST["ngayketthuc"];
$mota = $_POST["mota"];
$tilekm = $_POST["tilekm"];
$tenkm = $_POST["tenkm"];

$sql = "UPDATE khuyenmai SET NGAYBATDAU='" . $ngaybatdau . "', NGAYKETTHUC='" . $ngayketthuc . "', MOTA='" . $mota . "', TILEKHUYENMAI='" . $tilekm . "', TENKHUYENMAI='" . $tenkm . "' WHERE MAKHUYENMAI='" . $makm . "'";

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
