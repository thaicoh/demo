<?php
// Thêm header để vô hiệu hóa cache
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html>
<?php
// Kiểm tra xem cookie 'role' có tồn tại không
if (isset($_COOKIE['role']) && isset($_COOKIE['id'])) {
    // Lấy giá trị của cookie 'role'
    $role = $_COOKIE['role'];
    $id = $_COOKIE['id'];

    // Kiểm tra giá trị của cookie 'role'

    // Kết nối đến cơ sở dữ liệu của bạn
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlresort2";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Truy vấn dữ liệu từ bảng quocgia
    $sql = "SELECT * FROM khachhang WHERE MAKH = " . $id;
    $result = $conn->query($sql);

    $quocgiaData = [];

    // Kiểm tra xem có hàng nào được trả về hay không
    if ($result->num_rows > 0) {
        // Lặp qua từng hàng kết quả
        while ($row = $result->fetch_assoc()) {
            $quocgiaData = $row;
        }
    } else {
        echo "Không có kết quả nào được tìm thấy.";
    }
    print_r($quocgiaData);



    $conn->close();
} else {
    // Nếu cookie 'role' không tồn tại, chuyển hướng đến trang khác
    header('Location: index.html');
    exit;
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

    <link href="css/boostrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="index.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- select 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">
    <style>
        i {
            font-size: xx-large
        }

        #mess {
            height: 200px;
        }

        input {
            height: 40px;
        }

        .control.error small {
            color: #B31919;
        }

        .control.error>input {
            border: 1.5px solid #B31919 !important;
        }

        .control.error>textarea {
            border: 1.5px solid #B31919 !important;
        }


        small {
            position: absolute;
            bottom: -18px;
            width: 100%;
            left: 20px;
            font-size: small;
        }

        .control {
            position: relative;
        }

        .form_bg .btn {
            background-color: #313131;
            color: white;
            width: 10%;
        }

        .form_bg .btn:hover {
            background-color: #f0efef;
            color: rgb(0, 0, 0);
        }

        .form__gr {
            margin: 19px 0;
            position: relative !important;
        }

        .icon {
            border: 4px solid #253325;
            border-radius: 50%;
            padding: 20px;
            margin: 0 150px 0 150px;
        }

        .icon i {
            font-size: 10px !important;
            color: #253325;
        }


        .fa-eye-slash {
            position: absolute;
            right: 4px;
            bottom: calc(0% + 29px);
            color: rgb(94, 94, 94);
            bottom: 7px;
            font-size: 20px !important;

        }

        .fa-eye {
            position: absolute;
            right: 4px;
            bottom: calc(0% + 29px);
            bottom: 7px;
            color: rgb(94, 94, 94);
            font-size: 20px !important;
        }

        .hidden {
            display: none !important;
        }

        a {
            color: #253325;
        }




        @media screen and (min-width: 768px) and (max-width: 992px) {

            i,
            p {
                font-size: 250%;
            }

            h6 {
                font-size: 2rem;
            }

            .control {
                height: 150%;
            }

            input {
                height: 3.5rem;
            }

            .send {
                width: 35% !important;
                font-size: 1.6rem !important;
            }

            .footer p {
                font-size: 1rem;
            }

            .footer a {
                font-size: 1rem;
            }
        }

        @media screen and (min-width: 300px) and (max-width: 767px) {
            .send {
                width: 50% !important;
                font-size: 1.6rem !important;
            }

            img {
                height: 165 px;
            }

        }

        /*
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        */
        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);

        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            max-width: 380px;
            /* Giảm kích thước tối đa của thẻ card */
            padding: 1.5rem;
            /* Giảm khoảng cách giữa các nội dung trong thẻ card */
            border-radius: .2rem;
            /* Giảm độ cong của các góc của thẻ card */
        }

        .card img {
            max-width: 100%;
            /* Hình ảnh không vượt quá kích thước của thẻ card */
            height: auto;
            /* Đảm bảo tỷ lệ khung hình bị giữ khi thay đổi kích thước */
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 5px;
            padding: 0.5rem;
        }

        .drag-text {
            text-align: center;
            /* Căn giữa theo chiều ngang */
            display: flex;
            /* Sử dụng flexbox */
            justify-content: center;
            /* Căn giữa theo chiều ngang */
            align-items: center;
            /* Căn giữa theo chiều dọc */
            height: 60%;
            /* Đảm bảo văn bản được căn giữa theo chiều dọc */
        }



        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        /*  */
        #previewContainer {
            position: relative;
            display: flex;
            justify-content: left;
            padding: 10px;
            max-height: 400px;
            outline: none;
        }

        #chooseAgainButton {
            position: absolute;
            top: 0;
            right: 0;
            width: 30px;
            height: 30px;
            background-color: beige;
        }

        #previewImage {
            object-fit: cover;
            width: 100%;
        }
    </style>
</head>

<body>
    <!--Thanh menu  -->
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
                            <a class="nav-link" href="index.html">Trang chủ</a>
                            <span></span>
                        </li>
                        <li class="navbar-item">
                            <a class="nav-link" href="sanpham.html">Khu nghỉ dưỡng</a>
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
                                        <img src="./assets/icons/user.png" /><a href="trangcanhan.php">Tài khoảng của
                                            tôi</a>
                                    </li>
                                    <li>
                                        <img src="./assets/icons/history.png" /><a href="lichsu.php">Lịch sử</a>
                                    </li>
                                    <li><img src="./assets/icons/png-save.png" /><a href="#">Đã lưu</a></li>
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
    <!-- <div class="container-fluid">
        <img src="anh2/trangcanhan.png" alt="" class="w-100">
    </div> -->
    <h1 style="text-align: center; font-size: 50px; font-weight: bold; margin-top: 50px;">Thông Tin Cá Nhân</h1>

    <div class="container-fluid cach">
        <form id="demo-form2" data-parsley-validate="" class=" form_bg form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">

            <div class="row maunen justify-content-center">
                <div class="col-md-4 mb-3 d-flex justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div id='previewContainer' style="width:  230px; height: 230px; border-radius: 50% !important; outline: none !important;">
                                    <img id="previewImage" style="width: 100%; border-radius: 50% !important; outline: none !important;" src="<?php echo "cms/" . $quocgiaData['ANHKH']; ?>">
                                    <button id="chooseAgainButton" style="display: none;">X</button>
                                </div>
                                <div class="mt-3">
                                    <h4>
                                        <?php echo $quocgiaData['TENKH']; ?>
                                    </h4>

                                </div>
                            </div>
                            <div class="control col-lg-12 col-12 mt-4 d-flex justify-content-center">
                                <!-- Thêm phần upload ảnh đại diện tại đây -->
                                <!-- Ví dụ: -->

                                <!-- <div class="image-upload-wrap" style="">
                                    <input class="file-upload-input" id="uploadInput" type="file" name="avatar"
                                        onchange="readURLImg(this);" accept="image/*">
                                    <div class="drag-text">
                                        <h3>Chọn ảnh đại diện</h3>
                                    </div>
                                </div> -->
                                <input type="file" style="padding: 10px;" id="uploadInput" name="uploadInput" accept="image/*">
                                <script>
                                    document.getElementById("uploadInput").addEventListener("change", function(event) {
                                        var input = event.target;
                                        var reader = new FileReader();
                                        reader.onload = function() {
                                            var previewImage = document.getElementById("previewImage");
                                            previewImage.src = reader.result;
                                            document.getElementById("uploadInput").style.display = "none";
                                            document.getElementById("chooseAgainButton").style.display = "inline";
                                            // document.getElementById("deleteImageButton").style.display = "inline";
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    });

                                    document.getElementById("chooseAgainButton").addEventListener("click", function() {
                                        document.getElementById("uploadInput").style.display = "inline";

                                        // Đặt lại giá trị của trường input
                                        document.getElementById("uploadInput").value = "";
                                        // Đặt lại ảnh xem trước
                                        document.getElementById("previewImage").src = "";
                                        // Ẩn nút chọn lại và nút xóa ảnh
                                        document.getElementById("chooseAgainButton").style.display = "none";
                                    });
                                </script>


                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-5 col-12">
                    <div class="control mt-4">
                        <h6>Gmail *</h6>
                        <input class="w-100 hoten" id="emailkh" type="text" placeholder="" readonly value="<?php echo $quocgiaData['EMAILKH']; ?>">

                        <small></small>
                    </div>

                    <div class="control mt-4">
                        <h6>Họ Tên *</h6>
                        <input class="w-100 hoten" id="tenlh" type="text" placeholder="" value="<?php echo $quocgiaData['TENKH']; ?>">
                        <small></small>
                    </div>

                    <div class="control mt-4">
                        <h6>Số Điện Thoại *</h6>
                        <input class="w-100 hoten" id="sdtkh" type="text" placeholder="" value="<?php echo $quocgiaData['SDTKH']; ?>">
                        <small></small>
                    </div>

                    <div class="control mt-4">
                        <label for="gender" class=" control-label gt">Giới tính</label>
                        <select class="form-control" id="wb_gender" name="gender" required="">
                            <option value="" <?php echo ($quocgiaData['GIOITINH'] == '') ? 'selected' : '' ?>>null
                            </option>
                            <option value="0" <?php echo ($quocgiaData['GIOITINH'] == '0') ? 'selected' : '' ?>>Nữ
                            </option>
                            <option value="1" <?php echo ($quocgiaData['GIOITINH'] == '1') ? 'selected' : '' ?>>Nam
                            </option>
                        </select>
                    </div>

                    <div class="control mt-4">
                        <h6>Mật Khẩu</h6>
                        <input class="w-100 password" id="password" type="password" placeholder="" value="<?php echo $quocgiaData['MATKHAUKH']; ?>">
                        <i class="fa-solid fa-eye "></i>
                        <i class="fa-solid fa-eye-slash hidden"></i>
                        <small></small>
                    </div>
                    <script>
                        let password = document.querySelector("#password");
                        let eye = () => {
                            let eye1 = document.querySelectorAll('.fa-eye')[0];
                            let eye2 = document.querySelectorAll('.fa-eye-slash')[0];
                            if (password.value != '') {
                                eye1.classList.remove("hidden")
                                eye1.addEventListener('click', () => {
                                    password.type = 'text';
                                    eye1.classList.add("hidden");
                                    eye2.classList.remove("hidden");
                                })
                                eye2.addEventListener('click', () => {
                                    password.type = 'password';
                                    eye2.classList.add("hidden");
                                    eye1.classList.remove("hidden");
                                })
                            } else {
                                eye1.classList.add("hidden");
                                eye2.classList.add("hidden");
                            }
                        }

                        password.addEventListener('keydown', () => {
                            eye();
                        })
                        password.addEventListener('blur', () => {
                            eye();
                        })

                        eye();
                        input.forEach((e, i) => {
                            e.addEventListener('keydown', () => {

                            })
                        })
                    </script>

                </div>

                <div class="control col-lg-12 text-center">
                    <button data-makh='<?php echo $quocgiaData['MAKH']; ?>' data-vaitro='<?php echo $quocgiaData['VAITRO']; ?>' class="btn send mt-4 btncapnhat">Cập
                        Nhật</button>
                </div>


            </div>

    </div>
    </div>
    </form>
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
    <script>
        let so_o;
        if (window.innerWidth < 767) {
            so_o = 1.2; // Màn hình < 767px
        } else if (window.innerWidth < 991) {
            so_o = 1.5; // Màn hình < 991px
        } else {
            so_o = 2.3; // Màn hình >= 992px
        }
        $(document).ready(function() {
            $('.diaDiemNoiBat').slick({
                infinite: false,
                slidesToShow: so_o,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                arrows: false,
                dots: true,
            });
        });
        $(document).ready(function() {
            $('.diemDenNoiBat').slick({
                infinite: false,
                slidesToShow: 2.3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                arrows: false,
                dots: true,
            });
        });
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
    </script>


    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- //<script src="app.js"></script> -->
    <script src="app.js"></script>
    <script src="trangcanhan.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <!-- <script src="../js/jquery-3.7.1.min.js"></script> -->
    <script src="js/common.js"></script>
    <!-- <script src="trangcanhan.js"></script> -->

    <script>

    </script>

    <script src="js/bootbox/bootbox.all.min.js"></script>
    <!-- <script src="common.js"></script> -->
    <!-- <script src="dangki.js"></script> -->
</body>

</html>