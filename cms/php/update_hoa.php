<?php
require_once("server.php");

$maHoa = $_POST["maHoa"];
$maLoaiHoa = $_POST["maLoaiHoa"];
$maKhuyenMai = $_POST["maKhuyenMai"];
$tenHoa = $_POST["tenHoa"];
$moTaHoa = $_POST["moTaHoa"];
$soLuongCon = $_POST["soLuongCon"];
$giaHoa = $_POST["giaHoa"];
$anhHoa = $_POST["anhHoa"];

$sql = "UPDATE hoa 
        SET MALOAIHOA = '" . $maLoaiHoa . "', MAKHUYENMAI = '" . $maKhuyenMai . "', 
            TENHOA = '" . $tenHoa . "',
            MOTAHOA = '" . $moTaHoa . "', SOLUONGCON = '" . $soLuongCon . "',GIAHOA = '" . $giaHoa . "', ANHHOA = '" . $anhHoa . "' 
        WHERE MAHOA = '" . $maHoa . "'";

$response = array();

if (mysqli_query($conn, $sql)) {
    if (mysqli_affected_rows($conn) > 0) {
        $response["success"] = 1; // Thành công
    } else {
        $response["success"] = 0; // Không có bản ghi nào được cập nhật
    }
} else {
    $response["success"] = 0; // Lỗi trong quá trình thực hiện truy vấn
}

echo json_encode($response);
mysqli_close($conn);
