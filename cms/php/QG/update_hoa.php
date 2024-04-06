<?php
require_once("server.php");

$maQuocGia = $_POST["maQuocGia"];
$tenQuocGia = $_POST["tenQuocGia"];
$gioiThieuQuocGia = $_POST["gioiThieuQuocGia"];
$anhQuocGia = $_POST["anhQuocGia"];

$sql = "UPDATE quocgia SET ANHQUOCGIA='" . $anhQuocGia . "', TENQUOCGIA='" . $tenQuocGia . "', GIOITHIEUQUOCGIA='" . $gioiThieuQuocGia . "' WHERE MAQUOCGIA ='" . $maQuocGia . "'";

$res = array(); // Tạo một mảng kết quả

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
?>
