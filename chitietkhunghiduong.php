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


if (isset($_GET['idknd'])) {
    $productId = $_GET['idknd'];
    echo "Chi tiết sản phẩm có ID: $productId";

    $sql = "SELECT * FROM khunghiduong WHERE MAKND = " . $_GET['idknd'];
    $result = $conn->query($sql);

    // Lấy dữ liệu từ kết quả truy vấn và đưa vào mảng
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        print_r($row);
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
    <link href="item.css" rel="stylesheet" type="text/css" />
    <link href="index.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <!-- multiselect trên github  https://github.com/habibmhamadi/multi-select-tag   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />



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
                                        <img src="./assets/icons/user.png" /><a href="#">Tài khoảng của tôi</a>
                                    </li>
                                    <li>
                                        <img src="./assets/icons/history.png" /><a href="#">Lịch sử</a>
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
    <!-- video banner gioi thieu -->
    <div class="container-fluid row m-0">
        <div class="video col-lg-12">
            <video src="video/video-VN.mp4" autoplay controls></video>
        </div>
        <div class="col-lg-12 justify-content-center text-center">
            <p class="p"><?php echo $row['DIACHIKND'] ?></p>
            <h3><?php echo $row['TENKND'] ?></h3>
            <div class="info-item col-lg-12 text-center">
                <p><?php echo $row['MOTAKND'] ?></p>
            </div>
        </div>
    </div>
    <!-- list anh xem duoc -->
    <div class="container-fluid dt">
        <div class="image-list col-lg-12">
            <img src="anh-item/i1.jpg" alt="Image 1">
            <img src="anh-item/i2.jpg" alt="Image 2">
            <img src="anh-item/i3.jpg" alt="Image 3">
            <img src="anh-item/i4.jpg" alt="Image 1">
            <img src="anh-item/i5.jpg" alt="Image 2">
            <img src="anh-item/i6.jpg" alt="Image 3">
            <img src="anh-item/i7.jpg" alt="Image 1">
            <img src="anh-item/i8.jpg" alt="Image 2">
            <!-- Thêm các ảnh khác vào đây -->
        </div>
    </div>
    <!-- anh phong to -->
    <div class="full-image-container">
        <div class="close-button">&times;</div>
        <div class="full-image-wrapper w-50">
            <img class="full-image w-100" src="" alt="Full Image">
            <button class="prev-button">&lt;</button>
            <button class="next-button">&gt;</button>
        </div>
    </div>
    <!--  nơi ở -->
    <div class="container-fluid cach maunen text-center">
        <div class="noiO row justify-content-center ">
            <div class="col-lg-6 text-center maunen">
                <div class="noiO-item">
                    <img src="anh-item/bietthu.jpg" alt="">
                    <p class="subtitle">BIỆT THỰ</p>
                    <h3 class="heading-h">Gian hàng & biệt thự</h3>
                    <div class="info-card">
                        Mở ra sàn gỗ rộng rãi, nhiều căn có hồ bơi, Pavilions & Villas có tầm nhìn ngoạn mục ra biển
                        hoặc những ngọn đồi thoai thoải.</div>
                </div>
            </div>
            <div class="col-lg-6 text-center maunen">
                <div class="noiO-item ">
                    <img src="anh-item/nha o.jpg" alt="">
                    <p class="subtitle">CHỔ Ở</p>
                    <h3 class="heading-h">Không gian nhà ở</h3>
                    <div class="info-card">
                        Đồng thời với khung cảnh thiên nhiên tráng lệ, các Khu dân cư đầy đủ dịch vụ cung cấp tới năm
                        phòng ngủ và hồ bơi vô cực rộng lớn.</div>
                </div>
            </div>

            <a href="">Xem tất cả chổ ở</a>


        </div>
        <a href="booking.php?idknd=<?php echo $row['MAKND'] ?>" class="btn btn-booking mt-4">Đặt ngay</a>
    </div>

    <!-- tiện nghi -->
    <div class="container-fluid cach ">
        <div class="row tienNghi">
            <div class="card col-lg-4 tienNghi-item">
                <div class="item-info">
                    <a href="">
                        <img src="anh-item/1.jpg" alt="">
                        <p class="subtitle ml-0">LỄ KỶ NIỆM</p>
                        <h3 class="heading-h">Tổ chức sự kiện hoàn hảo</h3>
                        <div class="info-card">
                            Được bao bọc bởi một vùng hoang dã đẹp ngoạn mục trên dải bờ biển ấn tượng, Amanoi mang đến
                            vô số bối cảnh cả trong nhà và ngoài trời cho những lễ cưới và lễ kỷ niệm độc đáo nhất tại
                            Việt Nam.</div>
                    </a>
                    <a href="">xem them</a>
                </div>
            </div>
            <div class=" card col-lg-4 tienNghi-item">
                <div class="item-info">
                    <a href="">
                        <img src="anh-item/2.jpg" alt="">
                        <p class="subtitle ml-0">ĂN UỐNG</p>
                        <h3 class="heading-h">Hương vị thơm ngon</h3>
                        <div class="info-card">
                            Ẩm thực tại Amanoi tôn vinh hương vị thơm ngon của ẩm thực Việt Nam, tận dụng tối đa các sản
                            phẩm theo mùa và sản phẩm đánh bắt hàng ngày.</div>
                    </a>
                    <a href="">xem them</a>
                </div>
            </div>
            <div class=" card col-lg-4 tienNghi-item">
                <div class="item-info">
                    <a href="">
                        <img src="anh-item/3.jpg" alt="">
                        <p class="subtitle ml-0">GIỮ GÌN SỨC KHỎE</p>
                        <h3 class="heading-h">Chuyên gia chăm sóc sức khỏe</h3>
                        <div class="info-card">
                            Trong suốt cả năm, chương trình cư trú của Amanoi thu hút một danh sách quốc tế gồm các
                            chuyên gia sức khỏe toàn diện và các học viên chăm sóc sức khỏe đến spa.</div>
                    </a>
                    <a href="">xem them</a>
                </div>
            </div>
            <div class=" card col-lg-8 tienNghi-item">
                <div class="item-info">
                    <a href="">
                        <img src="anh-item/4.jpg" alt="">
                        <p class="subtitle ml-0">KINH NGHIỆM</p>
                        <h3 class="heading-h">Chăm sóc sức khỏe</h3>
                        <div class="info-card">
                            Hai Biệt thự có Hồ bơi Chăm sóc Sức khỏe độc ​​đáo của Amanoi được thiết kế dành cho những
                            người muốn tận hưởng kỳ nghỉ của mình để chăm sóc sức khỏe. Tận hưởng các phương pháp trị
                            liệu, trị liệu và các lớp học vận động trong sự riêng tư tuyệt đối mà không cần rời khỏi
                            Biệt thự Hồ bơi Chăm sóc Sức khỏe ven Hồ hoặc Biệt thự Hồ bơi Chăm sóc Sức khỏe Trong rừng
                            tách biệt.</div>
                    </a>
                    <a href="">xem them</a>
                </div>
            </div>
            <div class=" card col-lg-4 tienNghi-item">
                <div class="item-info">
                    <a href="">
                        <img src="anh-item/5.jpg" alt="">
                        <p class="subtitle ml-0">KINH NGHIỆM</p>
                        <h3 class="heading-h">Sinh hoạt gia đình</h3>
                        <div class="info-card">
                            Với chương trình hoạt động hàng ngày từ đan lá dừa và điêu khắc trên cát, đến các giải bóng
                            chuyền bãi biển, câu cá và các đêm chiếu phim, Amanoi đảm bảo rằng trẻ em và gia đình sẽ
                            cùng nhau tạo nên những kỷ niệm đẹp nhất.</div>
                    </a>
                    <a href="">xem them</a>
                </div>
            </div>


        </div>
    </div>
    <!-- vi tri -->
    <div class="vitri container-fluid cach">
        <div class="row justify-content-center">
            <div class="vitri-info col-lg-7 text-center">
                <h2>Vị Trí</h2>
                <p> Amanoi cách Sân bay Cam Ranh (CXR) 75 phút lái xe. Bằng đường hàng không, Cam Ranh cách Thành phố Hồ
                    Chí Minh 70 phút, cách Hà Nội 105 phút hoặc cách Đà Nẵng 65 phút. <br><br>
                    Di chuyển trong 5 giờ bằng ô tô từ Thành phố Hồ Chí Minh đến Amanoi qua đường cao tốc. <br><br>
                    Các chuyến bay thẳng quốc tế đến Sân bay Cam Ranh (CXR) từ Seoul, Bangkok, Hong Kong, Kuala Lumpur
                    và Almaty (Kazakhstan). <br><br>
                    Nhóm đặt phòng đa ngôn ngữ của chúng tôi luôn sẵn sàng trợ giúp lập kế hoạch du lịch, từ đặt phòng
                    một đêm cho đến hành trình nhiều khu nghỉ dưỡng
                </p>
            </div>
        </div>
        <div class="row justify-content-center bg-white pt-30">
            <div class="vitri-info row justify-content-center col-lg-8 col-10">
                <img class="col-12" src="anh-item/vitri.jpg" alt="">
                <div class="col-lg-5 col-md-6 row p-0 float-right">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>Vinh Hy Villag <br>
                        Vinh Hai Commune <br>
                        Ninh Thuan <br>
                        Vietnam</p>
                </div>
                <div class="col-lg-4 col-md-7 row float-right p-0">
                    <i class="fa-solid fa-plane"></i>
                    <p>Sân bay Cam Ranh (CXR) <br>
                        75 phút lái xe</p>
                </div>
                <div class="col-lg-3  col-md-4  p-0">
                    <div class="float-right">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <a href="" style="color: rgb(0, 58, 233); border-bottom: 1px solid ;"> hướng dẫn chi tiết</a>
                    </div>
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


        // slick slider
        let so_o;
        if (window.innerWidth < 767) {
            so_o = 2.1; // Màn hình < 767px
        } else if (window.innerWidth < 991) {
            so_o = 3.5; // Màn hình < 991px
        } else {
            so_o = 5.5; // Màn hình >= 992px
        }
        $(document).ready(function() {
            $('.image-list').slick({
                infinite: false,
                slidesToShow: so_o,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                arrows: false,
                dots: true,
            });
        });



        document.addEventListener("DOMContentLoaded", function() {
            var imageList = document.querySelector(".image-list");
            var fullImageContainer = document.querySelector(".full-image-container");
            var fullImage = document.querySelector(".full-image");
            var prevButton = document.querySelector(".prev-button");
            var nextButton = document.querySelector(".next-button");
            var images = Array.from(imageList.getElementsByTagName("img"));
            var currentIndex = 0;

            // Hiển thị ảnh phóng to
            function showFullImage(index) {
                currentIndex = index;
                var imageUrl = images[currentIndex].src;
                fullImage.src = imageUrl;
                fullImageContainer.classList.add("show");
            }

            // Đóng ảnh phóng to
            function closeFullImage() {
                fullImageContainer.classList.remove("show");
            }

            // Xử lý sự kiện click trên danh sách ảnh
            imageList.addEventListener("click", function(event) {
                var clickedImage = event.target;
                if (clickedImage.tagName === "IMG") {
                    var index = images.indexOf(clickedImage);
                    showFullImage(index);
                }
            });

            // Xử lý sự kiện click nút prev
            prevButton.addEventListener("click", function() {
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                showFullImage(currentIndex);
            });

            // Xử lý sự kiện click nút next
            nextButton.addEventListener("click", function() {
                currentIndex = (currentIndex + 1) % images.length;
                showFullImage(currentIndex);
            });

            // Xử lý sự kiện click để đóng ảnh phóng to
            fullImageContainer.addEventListener("click", function(event) {
                if (event.target === fullImageContainer) {
                    closeFullImage();
                }
            });

            // Xử lý sự kiện phím bấm
            document.addEventListener("keydown", function(event) {
                if (event.key === "Escape") {
                    closeFullImage();
                } else if (event.key === "ArrowLeft") {
                    currentIndex = (currentIndex - 1 + images.length) % images.length;
                    showFullImage(currentIndex);
                } else if (event.key === "ArrowRight") {
                    currentIndex = (currentIndex + 1) % images.length;
                    showFullImage(currentIndex);
                }
            });
            var closeButton = document.querySelector(".close-button");

            // Xử lý sự kiện click nút đóng (close button)
            closeButton.addEventListener("click", function() {
                closeFullImage();
            });

        });

        // xu ly dung  video
        const videoElements = document.querySelectorAll('video');

        const options = {
            root: null, // Sử dụng viewport làm root
            rootMargin: '0px',
            threshold: 0.9 // Chỉ chạy video khi 90% video hiển thị trên màn hình
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

    <!-- slick slider -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="app.js"></script>

</body>

</html>