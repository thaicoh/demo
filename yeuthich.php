<!DOCTYPE html>
<html>

<?php
// Kiểm tra xem cookie có tồn tại không
if (isset($_COOKIE['id'])) {
    // Lấy giá trị của cookie
    $cookie_id = $_COOKIE['id'];
    //echo "Cookie ID: $cookie_id";
    // Kết nối đến cơ sở dữ liệu của bạn
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlresort2";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM thich WHERE MAKH =$cookie_id";
    $result = $conn->query($sql);
    // Mảng chứa dữ liệu
    $thichData = array();
    $DATA = [];
    // Lấy dữ liệu từ kết quả truy vấn và đưa vào mảng
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $thichData[] = $row['MAKND'];
        }
        //print_r($thichData);

        foreach ($thichData as $maknd) {
            // Chuyển đổi các phần tử của mảng $thichData thành một chuỗi được phân tách bằng dấu phẩy
            $sql = "SELECT * FROM khunghiduong WHERE MAKND = $maknd";
            // Thực hiện câu truy vấn và lấy kết quả
            $result = $conn->query($sql);

            // Kiểm tra xem có kết quả trả về không
            if ($result->num_rows > 0) {
                // Lặp qua từng dòng kết quả và xử lý
                while ($row = $result->fetch_assoc()) {
                    // Xử lý dữ liệu ở đây, ví dụ:
                    $DATA[] = $row;
                    // Thực hiện các hành động khác...
                }
                //print_r($DATA);
            } else {
                // Không có kết quả trả về
                //echo "Không có kết quả nào.";
            }
        }
    } else {
        //echo "Bang thich Khong Co Ket Qua";
    }
    // Đóng kết nối
    $conn->close();
} else {
    echo "Cookie không tồn tại.";
    header('Location: dangnhap.html');
}


?>

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
    <link href="item.css" rel="stylesheet" type="text/css" />
    <link href="index.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!-- multiselect trên github  https://github.com/habibmhamadi/multi-select-tag   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <style>
        .btn-like {
            border: none;
            background-color: transparent;
            cursor: pointer;
        }

        .btn-like:hover {
            border: 1px solid white;
        }

        .diemDenNoiBat-item {
            width: 100%;
            height: max-content !important;
            background-color: #f8f9fa !important;
            padding: 25px !important;
            border-radius: 25px;
        }

        .diemDenNoiBat-item .subtitle-wrapper {
            display: flex;
            justify-content: space-between;
        }
    </style>



</head>

<body>

    <!-- Thanh Navbar  -->
    <div class="container-fluid maunen sticky-top z">
        <nav class="m-0 p-0 navbar navbar-expand-lg navbar-light bg-light maunen">
            <div class="row m-0 p-0 justify-content-between w-100">
                <div class="logo col-2 ">
                    <a class="navbar-brand m-0 p-0" href="index.html">Logo</a>
                </div>
                <div class="toggler-btn text-right col-1">
                    <buttom class="m-0 p-0" type="buttom" id="toggler">
                        <span class="navbar-toggler-icon m-0 p-0"></span>
                    </buttom>
                </div>
                <div class="col-lg-9 collapse navbar-collapse thanhmenu m-0 p-0 maunen ">
                    <ul class="navbar-nav ml-auto">
                        <li class="navbar-item  active">
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
                <a class="" href="sanpham.">Khu nghỉ dưỡng</a>
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="p-4 border border-white border-2">

                    <div class="text-center d-flex flex-column align-items-center">
                        <div class="border border-dashed border-secondary rounded-circle p-2">
                            <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center" style="width: 100px; height: 100px; overflow: hidden;">
                                <img src="download.jpg" alt="" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                        </div>
                        <p class="mt-4 font-weight-bold">+(84) 941222916</p>
                    </div>
                    <div class="px-4 py-2 mt-3 bg-light rounded cursor-pointer d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 icon-account_box"></span>
                            <span>Hồ sơ của tôi</span>
                        </div>
                    </div>
                    <div class="px-4 py-2 mt-3 bg-light rounded cursor-pointer d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 icon-history"></span>
                            <span>Đặt phòng của tôi</span>
                        </div>
                    </div>
                    <div class="px-4 py-2 mt-3 bg-light rounded cursor-pointer d-flex justify-content-between align-items-center font-weight-bold text-primary">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 icon-favorite_border"></span>
                            <span>Danh sách yêu thích</span>
                        </div>
                    </div>
                    <div class="px-4 py-2 mt-3 bg-light rounded cursor-pointer d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 icon-label"></span>
                            <span>Thông Báo </span>
                        </div>
                    </div>
                    <div class="px-4 py-2 mt-3 bg-light rounded cursor-pointer d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 icon-account_balance_wallet"></span>
                            <span>Cài đặt</span>
                        </div>
                    </div>
                    <div class="px-4 py-2 mt-3 bg-light rounded cursor-pointer d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="mr-2 icon-confirmation_number"></span>
                            <span>Coupon của tôi</span>
                        </div>
                    </div>

                    <hr class="my-4">
                    <div class="px-4 py-2 cursor-pointer d-flex align-items-center">
                        <button type="button" class="btn-like">Đăng xuất</button>
                    </div>
                </div>


            </div>
            <div class="col-md-8">
                <p class="font-weight-bold mb-4">
                <h3>Khách sạn yêu thích</h3>
                </p>
                <div class="row">
                    <?php
                    if (sizeof($DATA) == 0) {
                        echo "<p class='khongcodata'>Bạn chưa lưu Khu Nghĩ Dưỡng nào!</p>";
                    }
                    ?>

                    <?php foreach ($DATA as $item) : ?>
                        <div class="col-md-6 knd">
                            <div class="diemDenNoiBat-item m-1 p-0 text-center">
                                <a href="<?php echo "chitietkhunghiduong.php?idknd=" . $item['MAKND']; ?>">
                                    <img src="cms/<?php echo $item['ANHKND']; ?>" alt="" style="width: 300px; height: 300px; border-radius: 10px; margin-bottom: 10px;">
                                </a>
                                <div class="subtitle-wrapper">
                                    <a href="<?php echo "chitietkhunghiduong.php?idknd=" . $item['MAKND']; ?>">
                                        <p class="subtitle" style="display: inline;"><?php echo $item['TENKND']; ?></p>
                                    </a>


                                    <button type="button" class="btn-like iconUnlike" data-maknd="<?php echo $item['MAKND']; ?>">Bỏ thích</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- <div class="col-md-6">
                        <div class="diemDenNoiBat-item m-1 p-0 text-center">
                            <img src="anhSp/noibat6.jpg" alt="" style="width: 300px; height: auto; border-radius: 10px; margin-bottom: 10px;">
                            <div class="subtitle-wrapper">
                                <p class="subtitle" style="display: inline; margin-right: 50px;">Nha Trang, Việt Nam</p>
                                <button type="button" class="btn-like">Bỏ thích</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="diemDenNoiBat-item m-1 p-1 text-center">
                            <img src="anhSp/noibat6.jpg" alt="" style="width: 300px; height: auto; border-radius: 10px; margin-bottom: 10px;">
                            <div class="subtitle-wrapper">
                                <p class="subtitle" style="display: inline; margin-right: 50px;">Nha Trang, Việt Nam</p>
                                <button type="button" class="btn-like">Bỏ thích</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="diemDenNoiBat-item m-1 p-1 text-center">
                            <img src="anhSp/noibat6.jpg" alt="" style="width: 300px; height: auto; border-radius: 10px; margin-bottom: 10px;">
                            <div class="subtitle-wrapper">
                                <p class="subtitle" style="display: inline; margin-right: 50px;">Nha Trang, Việt Nam</p>
                                <button type="button" class="btn-like">Bỏ thích</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="diemDenNoiBat-item m-1 p-1 text-center">
                            <img src="anhSp/noibat6.jpg" alt="" style="width: 300px; height: auto; border-radius: 10px; margin-bottom: 10px;">
                            <div class="subtitle-wrapper">
                                <p class="subtitle" style="display: inline; margin-right: 50px;">Nha Trang, Việt Nam</p>
                                <button type="button" class="btn-like">Bỏ thích</button>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/common.js"></script>
    <script src="app.js"></script>
    <script src="yeuthich.js"></script>
</body>

</html>