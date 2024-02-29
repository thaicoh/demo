<?php
require_once("server.php");

$maHoa = $_POST["mahoa"];
$tenHoa = $_POST["tenhoa"];
$anhHoa = $_POST["anhloaihoa"];
$motaHoa = $_POST["motahoa"];
$giaHoa = $_POST["gia"];
$soLuongCon = $_POST["soluong"];
$maLoaiHoa = $_POST["maloaihoa"];
$maKhuyenMai = $_POST["makhuyenmai"];

$rs = mysqli_query($conn, "SELECT COUNT(*) AS 'total' FROM hoa WHERE MAHOA='" . $maHoa . "'");
$row = mysqli_fetch_array($rs);

if ((int)$row['total'] > 0) {
    $res["success"] = 2; // Trả về client - Trùng dữ liệu
} else {
    $sql = "INSERT INTO hoa (MAHOA, TENHOA, ANHHOA, MOTAHOA, GIAHOA, SOLUONGCON, MALOAIHOA, MAKHUYENMAI) VALUES ('" . $maHoa . "', '" . $tenHoa . "', '" . $anhHoa . "', '" . $motaHoa . "', '" . $giaHoa . "', '" . $soLuongCon . "', '" . $maLoaiHoa . "', '" . $maKhuyenMai . "')";

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
