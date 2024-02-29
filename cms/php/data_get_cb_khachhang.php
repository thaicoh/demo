<?php
require_once("server.php");

$response = array();

$sql = "SELECT `MAKH`,`TENKH`,`SDTKH`,`DIACHIKH`,`GTKH`,`EMAILKH` FROM `khachhang`";
$rs = mysqli_query($conn, $sql);

if ($rs) {
    $mang = array();
    while ($rows = mysqli_fetch_array($rs)) {
        $customer['MAKH'] = $rows['MAKH'];
        $customer['TENKH'] = $rows['TENKH'];
        $customer['SDTKH'] = $rows['SDTKH'];
        $customer['DIACHIKH'] = $rows['DIACHIKH'];
        $customer['GTKH'] = $rows['GTKH'];
        $customer['EMAILKH'] = $rows['EMAILKH'];
        array_push($mang, $customer);
    }

    $response['items'] = $mang;
} else {
    $response['error'] = mysqli_error($conn);
}

echo json_encode($response);
mysqli_close($conn);
?>
