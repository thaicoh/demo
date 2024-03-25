<?php
require_once("server.php");

$maKND = $_POST["maKND"];
$tenKND = $_POST["tenKND"];
$anhKND = $_POST["anhKND"];
$moTaKND = $_POST["moTaKND"];
$diaChiKND = $_POST["diaChiKND"];
$maLoaiHinh = $_POST["maLoaiHinh"];
$maQuocGia = $_POST["maQuocGia"];

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM khunghiduong WHERE MAKND='" . $maKND . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Trả về client - Trùng dữ liệu
} else {
    $sql = "INSERT INTO khunghiduong (MAKND, TENKND, ANHKND, MOTAKND, DIACHIKND, MALOAIHINH, MAQUOCGIA) VALUES ('" . $maKND . "', '" . $tenKND . "', '" . $anhKND . "', '" . $moTaKND . "', '" . $diaChiKND . "', '" . $maLoaiHinh . "', '" . $maQuocGia . "')";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $res["success"] = 1; // Thêm dữ liệu thành công
        } else {
            $res["success"] = 0; // Thêm dữ liệu thất bại
        }
    } else {
        $res["success"] = 0; // Thêm dữ liệu thất bại
    }
}

echo json_encode($res); // Trả về client
mysqli_close($conn);
?>
