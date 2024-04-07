<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = "qlresort2";
$port = 3306;
$conn = mysqli_connect($hostname, $username, $password, $dbname, $port);
if (!$conn) {
    die('Không thể kết nối: ');
    exit();
}
mysqli_set_charset($conn, "UTF8");

if (isset($_COOKIE['id'])) {
} else {
    // Nếu cookie 'role' không tồn tại, chuyển hướng đến trang khác
    header('Location: dangnhap.html');
    exit;
}


$dataresort = [];

if (isset($_GET['idknd'])) {
    $productId = $_GET['idknd'];
    //echo "Chi tiết sản phẩm có ID: $productId";

    $sql = "SELECT * FROM resort WHERE MAKND = " . $_GET['idknd'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dataresort[] = $row;
        }
    } else {
        echo "không co kết quả";
    }
    //print_r($dataresort);



    $sql2 = "SELECT * FROM khunghiduong WHERE MAKND = " . $_GET['idknd'];
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        //print_r($row2);
    } else {
        echo "không co kết quả";
    }
} else {
    echo "Không tìm thấy sản phẩm.";
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta name="viewport" content="minimum-scale=1"/> -->
    <meta name="viewport" content="height=device-height, 
                      width=device-width, initial-scale=1.0, 
                      minimum-scale=1.0, maximum-scale=1.0, 
                      user-scalable=no, target-densitydpi=device-dpi">
    <title>

    </title>
    <link href="css/boostrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="index.css" rel="stylesheet" type="text/css" />
    <link href="khampha.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- select 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Date picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
        select option {
            text-align: center;
        }

        .off.disabled {
            background-color: rgb(255, 131, 131) !important;
        }

        .active.start-date,
        .active.end-date {
            background-color: #ffe6c2 !important;
        }

        .in-range {
            background-color: #fff9ed !important;
        }

        .anh-booking {
            height: 500px;
            position: relative;
        }

        .anh-booking img {
            height: 100%;
            width: 100%;
            object-fit: cover !important;
        }

        .info-booking {
            padding: 16px;
            text-align: left;
            font-size: 14px;
            position: absolute;
            width: 45%;
            height: 40%;
            background-color: #fcfcfc;
            bottom: 0;
            left: 7.4%;
            opacity: 0.7;
        }


        p {
            margin: 0px !important;
        }

        .diachi,
        .sdt,
        .weblink {
            display: flex;
        }


        .diachi i,
        .sdt i,
        .weblink i {
            font-size: large;
        }

        .info-booking p {
            margin: 0px 0px 15px 10px;
        }

        .info-booking h2 {
            margin-bottom: 15px;
        }

        /* ul {
            list-style: none !important;
            display: flex;
        } */

        .offset-lg-3 li {
            padding: 20px;
        }

        .search-resort {
            /* height: 3000px; */
            /* background-color: aqua; */
        }

        .searching {
            margin-top: 70px;
            /* background-color: aliceblue; */
        }

        .input-seach {
            display: flex;
            background-color: white;
            height: 200px;
            width: 100%;
            justify-content: space-between;
        }

        .info-search {
            /* background-color: cadetblue; */
        }

        .input-seach .col-md-4 {
            margin: 0;
            box-sizing: border-box;
            background-color: rgb(236, 236, 236);
            height: 50%;
            border: 1px solid black !important
        }

        .chonslphong,
        .soluongkhach,
        .ngay {
            justify-content: center;
            padding: 5px;
        }

        .chonslphong i,
        .soluongkhach i,
        .ngay i {
            font-size: 25px;
        }

        .nguoilon p,
        .treem p {
            margin: 0;
            font-size: 18px;
        }

        .ngay input,
        .chonslphong select {
            padding: 2px 20px;
        }

        .nuttim {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-timphong {
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 50%;
            margin: 0;
            padding: 10px;
            background-color: rgb(31, 31, 31);
            color: #fcfcfc;
            font-size: 18px;

        }

        .thongtinluutru p {
            margin-bottom: 10px !important;
            width: 100%;
            /* Đặt khoảng cách dưới cho các phần tử <p> */
        }


        .btn-timphong p {
            margin: 0;
            margin-left: 10px;
        }


        .danhsachphong {}

        .item {
            width: 100%;
            padding: 10px;
            height: 255px;
            background-color: rgb(255, 255, 255);
            font-size: 14px;
            margin-top: 20px;
        }

        .thumb img {
            width: 100%;
        }

        .item-info {
            padding: 0;
        }

        .card-bottom {
            margin-left: 0px;
            width: 100%;
            padding-top: 15px;
            border-top: 1px solid rgb(142, 142, 142);
        }

        .item-datphong {
            text-align: right;
        }

        .item-datphong h4 {
            margin: 0;
        }

        .item-datphong .btn {
            background-color: rgb(36, 36, 36);
            color: #fcfcfc;
            padding: 5px !important;
            font-size: 16px;
        }

        .info-search {
            margin-top: 70px;
            position: relative;
        }

        .thongtinluutru {
            font-size: 16px;
            position: absolute;
            top: 0;
            left: 50%;
            /* Di chuyển đến phía trái giữa */
            transform: translateX(-50%);
            height: fit-content;
            border: 2px solid rgb(104, 104, 104);
            padding: 25px;
            opacity: 1;
            /* background-color: #ffe6c2; */
        }

        .total {
            border-top: 1px solid rgb(89, 89, 89);
            padding-top: 10px;
            margin-top: 10px;
        }

        .menu-soluongkhach {
            /* Thiết lập kiểu hiển thị của menu dropdown */
            padding: 10px;
        }

        .soluong-container {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
        }

        .soluong-label {
            font-weight: bold;
        }

        .soluong-control {
            display: flex;
            align-items: center;
        }

        .soluong-control button {
            padding: 5px 10px;
            cursor: pointer;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        .soluong-value {
            margin: 0 10px;
        }

        .btn-xacnhan {
            display: none;
            background-color: rgb(36, 36, 36);
            color: #fcfcfc;

        }

        .xacnhan {
            position: absolute;
            top: 320px;
            left: 50%;
            transform: translateX(-50%);
        }





        /* @media screen and (min-width: 768px) and (max-width: 992px) {
            ul li {
                font-size: 0.6rem;
            }

            p {
                font-size: 1rem;
            }

            .footer i {
                font-size: 1.2rem;
            }
        }

        @media screen and (min-width: 300px) and (max-width: 767px) {
            ul li {
                font-size: 0.6rem;
            }

            p {
                font-size: 1rem;
            }

            .footer i {
                font-size: 1.2rem;
            }

            p.subtitle {
                margin: 8px !important;
            }

            .heading-h {
                font-size: 1.37rem;
                margin: 8px !important;
            }

            .info-card {
                font-size: 0.9rem;
            }
        } */
    </style>

</head>

<body>
    <!--Thanh menu  -->
    <div class="container-fluid maunen sticky-top z">
        <nav class="m-0 p-0 navbar navbar-expand-lg navbar-light bg-light maunen">
            <div class="row m-0 p-0 justify-content-between w-100">
                <div class="logo col-2 ">
                    <a class="navbar-brand m-0 p-0" href="index.php">Logo</a>
                </div>
                <div class="toggler-btn text-right col-1">
                    <buttom class="m-0 p-0" type="buttom" id="toggler">
                        <span class="navbar-toggler-icon m-0 p-0"></span>
                    </buttom>
                </div>
                <div class="col-lg-9 collapse navbar-collapse thanhmenu m-0 p-0 maunen ">
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-item ">
                            <a class="nav-link" href="index.php">Trang chủ</a>
                            <span></span>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="sanpham.php">Khu nghỉ dưỡng</a>
                            <span></span>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="khampha.html">Khám phá</a>
                            <span></span>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                            <span></span>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="lienhe.html">Liên hệ</a>
                            <span></span>
                        </li>
                    </ul>
                    <div class="nav-item nav-btn text-left col-lg-2 p-0 ml-3 ">
                        <a class="nav-link p-0 " href="dangnhap.html">
                            <buttom class="btn mx-auto w-100 ">Đăng nhập</buttom>
                        </a>
                    </div>
                    <div class="nav-item nav-avt text-right col-lg-1 p-0 ml-3 hidden">
                        <div class="avtUser">
                            <img src="anh/avtUser.png" alt="">
                            <div class="dropdown-menu menu-user">
                                <h3>Resort DNA<br /><span>Website Designer</span></h3>
                                <ul>
                                    <li>
                                        <img src="./assets/icons/user.png" /><a href="trangcanhan.php">Tài khoảng của tôi</a>
                                    </li>
                                    <li>
                                        <img src="./assets/icons/history.png" /><a href="lichsu.php">Lịch sử</a>
                                    </li>
                                    <li><img src="./assets/icons/png-save.png" /><a href="yeuthich.php">Đã lưu</a></li>
                                    <li>
                                        <img src="./assets/icons/envelope.png" /><a href="#">Thông báo</a>
                                    </li>
                                    <li>
                                        <img src="./assets/icons/settings.png" /><a href="#">Cài đặt</a>
                                    </li>
                                    <li class="logout">
                                        <img src="./assets/icons/log-out.png" /><a href="#">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="thanhmenu text-center maunen " id="divMenu">
        <div class="justify-content-center">
            <div class="logo">
                <a class="navbar-brand m-0 p-0" href="#">Logo</a>
            </div>
            <div class="toggler-btn">
                <buttom type="buttom" id="toggler2">
                    <i class="fa-solid fa-x"></i>
                </buttom>
            </div>
        </div>
        <hr>
        <ul class="text-center">
            <li class="">
                <a class=" active" href="index.html">Trang chủ</a>
            </li>
            <li class="">
                <a class="" href="sanpham.html">Khu nghỉ dưỡng</a>
            </li>
            <li class="">
                <a class="" href="khampha.html">Khám phá</a>
            </li>
            <li class="">
                <a class="" href="blog.html">Blog</a>
            </li>
            <li class="">
                <a class="" href="lienhe.html">Liên hệ</a>
            </li>
            <li>
                <a href="dangnhap.html">
                    <buttom class="btn">Đăng nhập</buttom>
                </a>
            </li>
        </ul>
    </div>
    <!-- slides banner -->
    <div class="container-fluid cach text-center">
        <h1>Booking</h1>
    </div>
    <!-- <div class="container-fluid row m-0 mt-4 text-center p-0">
        <ul class="offset-lg-2 col-lg-8 offset-md-1 col-md-10 p-0 justify-content-between">
            <li><a href="">Hành trình aman</a></li>
            <li><a href="">Lễ kỷ niệm & Sự kiện</a></li>
            <li><a href="">Văn hóa & Bảo tồn</a></li>
            <li><a href="">Văn hóa & Bảo tồn</a></li>
        </ul>
        <p class="offset-lg-3 col-lg-6">
            Từ những đỉnh núi Himalaya của Bhutan đến những rạn san hô đầy màu sắc sống động xung quanh Quần đảo Spice
            huyền thoại của Indonesia , những trải nghiệm du lịch được tuyển chọn riêng và những chuyến thám hiểm đặc
            biệt của Aman là những điều kỳ diệu xa xôi nhất trên thế giới. Mạo hiểm vượt xa những điều bình thường và
            khám phá nhiều điểm đến trong một chuyến đi với hành trình tùy chỉnh thông qua máy bay riêng hoặc du thuyền.
        </p>
    </div> -->
    <!-- panner -->
    <div class="text-center anh-booking">
        <img src="anh/booking_files/73190000_XXL.jpg" alt="">
        <div class="info-booking">
            <h2><?php echo $row2['TENKND'] ?></h2>
            <div class="diachi">
                <i class="fa-solid fa-map-location"></i>
                <p>Vinh Hy Village, Vinh Hai Commune, Ninh Hai District, Ninh Thuan Province, Việt Nam, 00000</p>
            </div>
            <div class="sdt">
                <i class="fa-solid fa-square-phone"></i>
                <p>0765944488 - 0337542312</p>
            </div>
            <div class="weblink">
                <i class="fa-solid fa-link"></i>
                <p>https://www.aman.com/resorts/amanoi</p>
            </div>
        </div>
    </div>
    <!-- chủ đề du lịch "dùng slick slider" -->
    <div class="search-resort row justify-content-center">
        <div class="searching col-md-6">
            <div class="input-seach row ">

                <div class="soluongkhach col-md-4  row">
                    <div class="col-md-12 d-flex justify-content-center">
                        <i class="fa-regular fa-user"></i>
                        <h3 class="ml-2 mb-0">Khách</h3>
                    </div>
                    <div class="d-flex">
                        <div class="nguoilon">
                            <p>2 Người lớn</p>
                        </div>
                        <div class="treem">
                            <p> , 0 Trẻ em</p>
                        </div>
                    </div>

                    <div class="dropdown-menu menu-soluongkhach">
                        <div class="soluong-container">
                            <div class="soluong-label">Người lớn:</div>
                            <div class="soluong-control">
                                <button class="soluong-minus">-</button>
                                <span class="soluong-value soluongnguoilon">2</span>
                                <button class="soluong-plus">+</button>
                            </div>
                        </div>
                        <div class="soluong-container">
                            <div class="soluong-label">Trẻ em:</div>
                            <div class="soluong-control">
                                <button class="soluong-minus">-</button>
                                <span class="soluong-value soluongtreem">0</span>
                                <button class="soluong-plus">+</button>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button class="btn-huy">Hủy</button>
                            <button class="btn-ok">OK</button>
                        </div>
                    </div>

                </div>

                <div class="ngay col-md-4">
                    <div class="col-md-12 d-flex justify-content-center">
                        <i class="fa-regular fa-calendar-days"></i>
                        <h3 class="ml-2 mb-0">Ngày</h3>
                    </div>
                    <div class="d-flex">
                        <input id="daterange" type="text" name="daterange" class="w-100" />
                    </div>
                </div>

                <div class="col-md-4 chonslphong">
                    <div class="col-md-12 d-flex justify-content-center">
                        <i class="fa-solid fa-person-shelter"></i>
                        <h3 class="ml-2 mb-0">Số phòng</h3>
                    </div>
                    <div class="col-md-12 d-flex">
                        <select name="soluongphong" id="soluongphong" class="w-100">
                            <option value="1" selected>1 Phòng</option>
                            <option value="2">2 Phòng</option>
                            <option value="3">3 Phòng</option>
                            <option value="4">4 Phòng</option>
                            <option value="5">5 Phòng</option>
                        </select>

                    </div>
                </div>

                <div class="soluongkhach col-md-12">
                    <div class="col-md-12 nuttim">
                        <div class="btn btn-timphong d-flex" data-maknd="<?php echo $_GET['idknd'] ?>">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <p>Tìm phòng</p>
                        </div>
                    </div>

                </div>
            </div>

            <h2>Danh sách phòng</h2>

            <div class="filter">
            </div>

            <div class="danhsachphong">
                <?php foreach ($dataresort as $resort) : ?>

                    <div class="item row">
                        <div class=" thumb col-md-5">
                            <img src="<?php echo $resort['IMGTHUMP'] ?>" alt="">
                        </div>
                        <div class="item-info col-md-7 ">
                            <h2 class="app_heading1"><?php echo $resort['TENRESORT'] ?></h2>
                            <p> <?php echo $resort['SOLUONGGIUONG'] ?> Giường <?php echo ($resort['LOAIGIUONG'] == 1) ? "cỡ lớn" : "cỡ nhỏ" ?> , <?php echo $resort['DIENTICH'] ?>m2</p>
                            <a href="">Chi tiet phong</a>

                            <div class="row card-bottom mt-4">
                                <div class="col-md-6 p-0">
                                    <p>Loại phòng cơ bản</p>
                                    <div class="d-flex">
                                        <i class="fa-solid fa-mug-hot"></i>
                                        <p>Bao gom bua sang</p>
                                    </div>
                                </div>
                                <div class="col-md-6 p-0 item-datphong">
                                    <h4><?php echo $resort['GIATRENDEM'] ?> US$</h4>
                                    <p>Mỗi đêm</p>
                                    <p>Không tính thuế và phí</p>
                                    <div class="btn btn-datphong" data-maresort="<?php echo $resort['MARESORT'] ?>">
                                        Đặt ngay
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- <div class="item row">
                    <div class=" thumb col-md-5">
                        <img src="anh/booking_files/67490324_XXL.jpg" alt="">
                    </div>
                    <div class="item-info col-md-7 ">
                        <h2 class="app_heading1">Ocean Pavilion</h2>
                        <p>1 Giường cỡ lớn , 95m2</p>
                        <a href="">Chi tiet phong</a>

                        <div class="row card-bottom mt-4">
                            <div class="col-md-6 p-0">
                                <p>Loại phòng cơ bản</p>
                                <div class="d-flex">
                                    <i class="fa-solid fa-mug-hot"></i>
                                    <p>Bao gom bua sang</p>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 item-datphong">
                                <h4>1.660 US$</h4>
                                <p>Mỗi đêm</p>
                                <p>Không tính thuế và phí</p>
                                <div class="btn">
                                    Đặt ngay
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class=" thumb col-md-5">
                        <img src="anh/booking_files/67490386_XXL.jpg" alt="">
                    </div>
                    <div class="item-info col-md-7 ">
                        <h2 class="app_heading1">Ocean Pavilion</h2>
                        <p>1 Giường cỡ lớn , 95m2</p>
                        <a href="">Chi tiet phong</a>

                        <div class="row card-bottom mt-4">
                            <div class="col-md-6 p-0">
                                <p>Loại phòng cơ bản</p>
                                <div class="d-flex">
                                    <i class="fa-solid fa-mug-hot"></i>
                                    <p>Bao gom bua sang</p>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 item-datphong">
                                <h4>1.660 US$</h4>
                                <p>Mỗi đêm</p>
                                <p>Không tính thuế và phí</p>
                                <div class="btn">
                                    Đặt ngay
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class=" thumb col-md-5">
                        <img src="anh/booking_files/71656414_XXL.jpg" alt="">
                    </div>
                    <div class="item-info col-md-7 ">
                        <h2 class="app_heading1">Ocean Pavilion</h2>
                        <p>1 Giường cỡ lớn , 95m2</p>
                        <a href="">Chi tiet phong</a>

                        <div class="row card-bottom mt-4">
                            <div class="col-md-6 p-0">
                                <p>Loại phòng cơ bản</p>
                                <div class="d-flex">
                                    <i class="fa-solid fa-mug-hot"></i>
                                    <p>Bao gom bua sang</p>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 item-datphong">
                                <h4>1.660 US$</h4>
                                <p>Mỗi đêm</p>
                                <p>Không tính thuế và phí</p>
                                <div class="btn">
                                    Đặt ngay
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class=" thumb col-md-5">
                        <img src="anh/booking_files/72807490_XXL.jpg" alt="">
                    </div>
                    <div class="item-info col-md-7 ">
                        <h2 class="app_heading1">Ocean Pavilion</h2>
                        <p>1 Giường cỡ lớn , 95m2</p>
                        <a href="">Chi tiet phong</a>

                        <div class="row card-bottom mt-4">
                            <div class="col-md-6 p-0">
                                <p>Loại phòng cơ bản</p>
                                <div class="d-flex">
                                    <i class="fa-solid fa-mug-hot"></i>
                                    <p>Bao gom bua sang</p>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 item-datphong">
                                <h4>1.660 US$</h4>
                                <p>Mỗi đêm</p>
                                <p>Không tính thuế và phí</p>
                                <div class="btn">
                                    Đặt ngay
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class=" thumb col-md-5">
                        <img src="anh/booking_files/67490324_XXL.jpg" alt="">
                    </div>
                    <div class="item-info col-md-7 ">
                        <h2 class="app_heading1">Ocean Pavilion</h2>
                        <p>1 Giường cỡ lớn , 95m2</p>
                        <a href="">Chi tiet phong</a>

                        <div class="row card-bottom mt-4">
                            <div class="col-md-6 p-0">
                                <p>Loại phòng cơ bản</p>
                                <div class="d-flex">
                                    <i class="fa-solid fa-mug-hot"></i>
                                    <p>Bao gom bua sang</p>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 item-datphong">
                                <h4>1.660 US$</h4>
                                <p>Mỗi đêm</p>
                                <p>Không tính thuế và phí</p>
                                <div class="btn">
                                    Đặt ngay
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class=" thumb col-md-5">
                        <img src="anh/booking_files/67490324_XXL.jpg" alt="">
                    </div>
                    <div class="item-info col-md-7 ">
                        <h2 class="app_heading1">Ocean Pavilion</h2>
                        <p>1 Giường cỡ lớn , 95m2</p>
                        <a href="">Chi tiet phong</a>

                        <div class="row card-bottom mt-4">
                            <div class="col-md-6 p-0">
                                <p>Loại phòng cơ bản</p>
                                <div class="d-flex">
                                    <i class="fa-solid fa-mug-hot"></i>
                                    <p>Bao gom bua sang</p>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 item-datphong">
                                <h4>1.660 US$</h4>
                                <p>Mỗi đêm</p>
                                <p>Không tính thuế và phí</p>
                                <div class="btn">
                                    Đặt ngay
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item row">
                    <div class=" thumb col-md-5">
                        <img src="anh/booking_files/72807490_XXL.jpg" alt="">
                    </div>
                    <div class="item-info col-md-7 ">
                        <h2 class="app_heading1">Ocean Pavilion</h2>
                        <p>1 Giường cỡ lớn , 95m2</p>
                        <a href="">Chi tiet phong</a>

                        <div class="row card-bottom mt-4">
                            <div class="col-md-6 p-0">
                                <p>Loại phòng cơ bản</p>
                                <div class="d-flex">
                                    <i class="fa-solid fa-mug-hot"></i>
                                    <p>Bao gom bua sang</p>
                                </div>
                            </div>
                            <div class="col-md-6 p-0 item-datphong">
                                <h4>1.660 US$</h4>
                                <p>Mỗi đêm</p>
                                <p>Không tính thuế và phí</p>
                                <div class="btn">
                                    Đặt ngay
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="info-search col-md-4">
            <div class="thongtinluutru row w-100">
                <h4>Thông tin lưu trú của bạn</h4>
                <div class="col-md-6 p-0">
                    <p class="font-weight-bold">Nhận phòng</p>
                    <p>Sau 15:00</p>
                </div>
                <div class="col-md-6 p-0">
                    <p class="font-weight-bold">Trả phòng</p>
                    <p>Trước 12:00</p>
                </div>
                <p>Th 4, 28 thg 2, 2024 - Th 5, 29 thg 2, 2024</p>
                <p>2 Người lớn</p>
                <div class="total d-flex justify-content-between w-100">
                    <div>
                        <h4>Tong: </h4>
                    </div>
                    <div>
                        <h4>0.00 US$</h4>
                    </div>
                </div>

            </div>
            <div class="d-flex col-md-12 justify-content-center mt-4 xacnhan">
                <div class="btn btn-xacnhan ">
                    Xác nhận
                </div>
            </div>

        </div>

    </div>




    <!-- footer -->
    <div class="container-fluid footer m-0 p-0 cach bg-white">
        <footer class="text-center text-lg-start ">
            <!-- Grid container -->
            <div class="container-fluid p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row ">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Company name
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer
                                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                            <p>
                                <a class="text-white">MDBootstrap</a>
                            </p>
                            <p>
                                <a class="text-white">MDWordPress</a>
                            </p>
                            <p>
                                <a class="text-white">BrandFlow</a>
                            </p>
                            <p>
                                <a class="text-white">Bootstrap Angular</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Useful links
                            </h6>
                            <p>
                                <a class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a class="text-white">Help</a>
                            </p>
                        </div>

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fa-solid fa-location-dot"></i> New York, NY 10012, US</p>
                            <p><i class="fas fa-envelope mr-3"></i> thaihoc1210@gmail.com</p>
                            <p><i class="fa-solid fa-phone"></i> + 01 234 567 88</p>
                            <p><i class="fa-solid fa-phone"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->

                <hr class="my-3">

                <!-- Section: Copyright -->
                <section class="p-3 pt-0">
                    <div class="row d-flex align-items-center">
                        <!-- Grid column -->
                        <div class="col-md-7 col-lg-8 text-center text-md-start">
                            <!-- Copyright -->
                            <div class="p-3">
                                © 2020 Copyright:
                                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                            </div>
                            <!-- Copyright -->
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                            <!-- Facebook -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i class="fab fa-instagram"></i></a>
                        </div>
                        <!-- Grid column -->
                    </div>
                </section>
                <!-- Section: Copyright -->
            </div>
            <!-- Grid container -->
        </footer>
        <!-- Footer -->
    </div>

    <!-- back to top -->
    <button class="backTop" onclick="scrollToTop()">
        <i class="fa-solid fa-angles-up"></i>
    </button>

    <script>
        let so_o;
        if (window.innerWidth < 767) {
            so_o = 1.2; // Màn hình < 767px
        } else if (window.innerWidth < 991) {
            so_o = 1.5; // Màn hình < 991px
        } else {
            so_o = 2.3; // Màn hình >= 992px
        }

        // xu ly dung  video
        const videoElements = document.querySelectorAll('video');

        const options = {
            root: null, // Sử dụng viewport làm root
            rootMargin: '0px',
            threshold: 0.1 // Chỉ chạy video khi 90% video hiển thị trên màn hình
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.play(); // Chạy video khi nó hiển thị trên màn hình
                } else {
                    entry.target.pause(); // Tạm dừng video khi nó không hiển thị trên màn hình
                }
            });
        }, options);

        videoElements.forEach((videoElement) => {
            observer.observe(videoElement);
        });


        // backToTop
        window.addEventListener('scroll', function() {
            var backTopButton = document.querySelector('.backTop');
            if (window.pageYOffset > 200) {
                backTopButton.classList.add('show');
            } else {
                backTopButton.classList.remove('show');
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- datetime picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(function() {
            var disabledDates = [];
            var today = moment(); // Lấy ngày hôm nay
            var tomorrow = moment().add(1, 'day'); // Lấy ngày mai

            $('#daterange').daterangepicker({
                startDate: today,
                endDate: tomorrow,
                isInvalidDate: function(date) {
                    // Kiểm tra xem ngày có trong disabledDates không
                    return date.isBefore(today, 'day');
                },
                locale: {
                    format: 'DD/MM/YYYY', // Định dạng ngày
                    separator: ' đến ', // Ngăn cách giữa ngày bắt đầu và kết thúc trong lịch
                    applyLabel: 'Áp dụng', // Nhãn cho nút áp dụng
                    cancelLabel: 'Hủy', // Nhãn cho nút hủy bỏ
                    fromLabel: 'Từ', // Nhãn cho ngày bắt đầu
                    toLabel: 'Đến', // Nhãn cho ngày kết thúc
                    customRangeLabel: 'Phạm vi tùy chỉnh', // Nhãn cho phạm vi tùy chỉnh
                    daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'], // Tên của các ngày trong tuần
                    monthNames: [
                        'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                        'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
                    ], // Tên của các tháng
                    firstDay: 1 // Ngày đầu tiên của tuần (0: Chủ nhật, 1: Thứ hai, v.v.)
                    // Và các tùy chọn ngôn ngữ khác nếu cần
                }
            }).on('apply.daterangepicker', function(ev, picker) {
                var start = picker.startDate;
                var end = picker.endDate;
                var isValidRange = true;

                // Lặp qua mỗi ngày trong range
                for (var d = moment(start); d <= end; d = d.add(1, 'days')) {
                    // Kiểm tra nếu bất kỳ ngày nào trong range là ngày không thể chọn
                    if (disabledDates.includes(d.format('YYYY-MM-DD'))) {
                        isValidRange = false;
                        break;
                    }
                }

                // Nếu range không hợp lệ, đặt giá trị về null
                if (!isValidRange) {
                    $(this).val('');
                    alert("ngay chon khong hop le!")
                }
            });
        });

        // so luong khach 
        // cap nhat so luong khach
        $(document).ready(function() {
            // Xử lý sự kiện click vào nút ".btn-ok"
            $('.btn-ok').click(function() {
                // Lấy giá trị số lượng người lớn từ dropdown menu
                var nguoilonValue = parseInt($('.menu-soluongkhach .soluong-container:nth-child(1) .soluong-value').text());
                // Lấy giá trị số lượng trẻ em từ dropdown menu
                var treemValue = parseInt($('.menu-soluongkhach .soluong-container:nth-child(2) .soluong-value').text());

                // Cập nhật số lượng người lớn vào phần tử ".nguoilon"
                $('.nguoilon p').text(nguoilonValue + " Người lớn");
                // Cập nhật số lượng trẻ em vào phần tử ".treem"
                $('.treem p').text(", " + treemValue + " Trẻ em");

                // Đóng dropdown menu sau khi cập nhật
                $('.menu-soluongkhach').slideUp('fast');
            });

            // Xử lý sự kiện click vào nút ".soluong-minus"
            $('.soluong-minus').click(function() {
                var $soluongValue = $(this).siblings('.soluong-value');
                var currentValue = parseInt($soluongValue.text());
                if (currentValue > 0) {
                    $soluongValue.text(currentValue - 1);
                }
            });

            // Xử lý sự kiện click vào nút ".soluong-plus"
            $('.soluong-plus').click(function() {
                var $soluongValue = $(this).siblings('.soluong-value');
                var currentValue = parseInt($soluongValue.text());
                $soluongValue.text(currentValue + 1);
            });
        });
    </script>
    <script src="js/common.js"></script>
    <script src="app.js"></script>
    <script src="booking.js"></script>
</body>

</html>