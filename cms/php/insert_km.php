<?php
require_once("server.php");

$makm = $_POST["makm"];
$ngaybatdau = $_POST["ngaybatdau"];
$ngayketthuc = $_POST["ngayketthuc"];
$mota = $_POST["mota"];
$tilekm = $_POST["tilekm"];
$tenkm = $_POST["tenkm"];

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khuyenmai WHERE MAKHUYENMAI='" . $makm . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Trả về client trùng dữ liệu
} else {
    $sql = "INSERT INTO khuyenmai(MAKHUYENMAI, NGAYBATDAU, NGAYKETTHUC, MOTA, TILEKHUYENMAI, TENKHUYENMAI) VALUES ('" . $makm . "','" . $ngaybatdau . "','" . $ngayketthuc . "','" . $mota . "','" . $tilekm . "','" . $tenkm . "')";

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
