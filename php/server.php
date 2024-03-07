<?php
$hostname='localhost';
$username='root';
$password='';
$dbname="qlresort";
$port=3306;
$conn=mysqli_connect($hostname,$username,$password,$dbname,$port);
if(!$conn){
    die('Không thể kết nối: '.mysqli_error($conn));
    exit();
}
//echo 'kết nối thành công';
mysqli_set_charset($conn,"UTF8");

?>