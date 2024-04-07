<?php
require_once("server.php");

$response = array();

$sql = "SELECT `MAKH`,`TENKH`,`SDTKH`,`EMAILKH`,`MATKHAUKH`,`ANHKH`,`GIOITINH`,`VAITRO` FROM `khachhang`";
$rs = mysqli_query($conn, $sql);

if ($rs) {
    $mang = array();
    while ($rows = mysqli_fetch_array($rs)) {
        $customer['MAKH'] = $rows['MAKH'];
        $customer['TENKH'] = $rows['TENKH'];
        $customer['SDTKH'] = $rows['SDTKH'];
        $customer['EMAILKH'] = $rows['EMAILKH'];
        $customer['MATKHAUKH'] = $rows['MATKHAUKH'];
        $customer['ANHKH'] = $rows['ANHKH'];
        $customer['GIOITINH'] = $rows['GIOITINH'];
        $customer['VAITRO'] = $rows['VAITRO'];
        array_push($mang, $customer);
    }

    $response['items'] = $mang;
} else {
    $response['error'] = mysqli_error($conn);
}

echo json_encode($response);
mysqli_close($conn);
?>
