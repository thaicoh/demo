<!DOCTYPE html>
<html>

<?php
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
$sql = "SELECT MAQUOCGIA, TENQUOCGIA, GIOITHIEUQUOCGIA, ANHQUOCGIA FROM quocgia";
$result = $conn->query($sql);

// Mảng chứa dữ liệu
$quocgiaData = array();

// Lấy dữ liệu từ kết quả truy vấn và đưa vào mảng
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $quocgiaData[] = $row;
    }
} else {
    echo "Bang Quoc Gia Khong Co Ket Qua";
}
//print_r($quocgiaData);

// Truy vấn dữ liệu từ bảng loaihinh
$sql2 = "SELECT MALOAIHINH , TENLOAIHINH, MOTALOAIHINH, ANHLOAIHINH, titleloaihinh FROM loaihinh";
$result2 = $conn->query($sql2);
$loaihinhData = array();

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $loaihinhData[] = $row;
    }
} else {
    echo "Bang loaihinh Khong Co Ket Qua";
}
//print_r($loaihinhData);

// Đóng kết nốiz
$conn->close();
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="dropdown.css" rel="stylesheet" type="text/css" />
    <link href="index.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">

    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- select 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <style>
        .diaDiemNoiBat img{
            height: 450px;
        }

        .card.quocgia img{
            height: 550px !important;
        }
        .imglogo{
            width: 60px;
            border-radius: 50%;
            margin: 10px;
        }
    </style>
</head>

<body class="body">
    <!--Thanh menu  -->
    <div class="container-fluid maunen sticky-top z">
        <nav class="m-0 p-0 navbar navbar-expand-lg navbar-light bg-light maunen">
            <div class="row m-0 p-0 justify-content-between w-100">
                <div class="logo col-2 ">
                    <a class="navbar-brand m-0 p-0" href="index.php"><img class="imglogo"  src="anh/logo2.png" alt=""></a>
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
    <div class="container-fluid p-5-dt">
        <div class=" video">
            <video id="myVideo" src="video/index.mp4" autoplay controls></video>
        </div>
    </div>

    <!-- tieu de gioi thieu -->
    <div class="text-center gioithieu-dt cach">
        <h2>Khám phá những nét văn hóa đặt trưng của các nước Đông Nam Á</h2>
        <p>Mùa này - khi những bông hoa đầu tiên của mùa xuân khơi dậy cảm giác hân hoan và đổi mới - chúng tôi tôn vinh
            những môi trường tự nhiên đặc biệt trên toàn cầu mà chúng tôi gọi là nhà.</p>
    </div>
    <!-- líst quốc gia  -->
    <div class="container-fluid  row maunen cach p-0 m-0" id="quocgiaList">

        <?php foreach ($quocgiaData as $quocgia) : ?>

            <div class="card quocgia col-lg-4 col-6 text-left maunen">
                <a href="sanpham-VN.html">
                    <img src="<?php echo 'cms/' . $quocgia['ANHQUOCGIA']; ?>" alt="">
                    <h2><?php echo $quocgia['TENQUOCGIA']; ?></h2>
                </a>
                <div class="info-card">
                    <?php echo $quocgia['GIOITHIEUQUOCGIA']; ?>
                </div>
                <a class="a-more" href="">Xem thêm</a>
            </div>
        <?php endforeach; ?>

        <!-- <div class="card quocgia col-lg-4 col-6 text-left maunen">
            <a href="sanpham-VN.html">
                <img src="quocgia/vietnam.jpg" alt="">
                <h2>Việt Nam</h2>
            </a>
            <div class="info-card">
                Khám phá resort tuyệt vời của chúng tôi tại Việt Nam! Tọa lạc trong vẻ đẹp tự nhiên hùng vĩ, chúng tôi
                mang đến cho bạn một trải nghiệm nghỉ dưỡng tuyệt vời. Với bãi biển trắng mịn,</div>
            <a class="a-more" href="">Xem thêm</a>
        </div> -->
        <!-- <div class=" card quocgia col-lg-4 col-6 text-left maunen">
            <a href="sanpham-Mal.html">
                <img src="quocgia/mala.jpg" alt="">
                <h2>Malaysia</h2>
            </a>
            <div class="info-card">
                Khám phá kỳ quan nghỉ dưỡng của chúng tôi tại Malaysia! Với thiên đường biển tuyệt đẹp, kiến trúc độc
                đáo và dịch vụ tận tâm, chúng tôi mang đến cho bạn một trải nghiệm nghỉ dưỡng đáng nhớ.</div>
            <a class="a-more" href="">Xem thêm</a>
        </div> -->
        <!-- <div class=" card quocgia col-lg-4 col-6 text-left maunen">
            <a href="sanpham-Ind.html">
                <img src="quocgia/ind.jpg" alt="">
                <h2>Indonexia</h2>
            </a>
            <div class="info-card">
                Tại Indonesia! Với cảnh quan tự nhiên tuyệt đẹp, biển xanh ngát và không gian yên bình, resort của chúng
                tôi là điểm đến lý tưởng để thư giãn và khám phá văn hóa độc đáo.
            </div>
            <a class="a-more" href="">Xem thêm</a>
        </div> -->
        <!-- <div class="card quocgia col-lg-4 col-6 text-left maunen" id="quocgiaList">
            <a href="sanpham-Lao.html">
                <img src="quocgia/lao.jpg" alt="">
                <h2>Lào</h2>
            </a>
            <div class="info-card">
                Được bao bọc bởi cảnh quan thiên nhiên tươi đẹp, chúng tôi mang đến cho bạn một kỳ nghỉ thư giãn và đáng
                nhớ. Với kiến trúc truyền thống độc đáo, các phòng nghỉ thoải mái và dịch vụ chất lượng </div>
            <a class="a-more" href="">Xem thêm</a>
        </div> -->
        <!-- <div class=" card quocgia col-lg-4 quocgia col-6 text-left maunen">
            <a href="sanpham-Cam.html">
                <img src="anh/Amanera-Resort-Casa-Grande-Exterior-3337-sRGB.jpg" alt="">
                <h2>Campuchia</h2>
            </a>
            <div class="info-card">
                From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a
                Moroccan oasis, these Aman destinations offer unique perspectives of Europe and North Africa.
            </div>
            <a class="a-more" href="">Xem thêm</a>
        </div> -->
        <!-- <div class=" card quocgia col-lg-4 col-6 text-left maunen">
            <a href="sanpham-Thai.html">
                <img src="quocgia/thailan.jpg" alt="">
                <h2>Thái Lan</h2>
            </a>
            <div class="info-card">
                Chúng tôi tự hào giới thiệu một trải nghiệm nghỉ dưỡng tuyệt vời, kết hợp sự tinh tế đẳng cấp. Đắm mình
                trong khung cảnh tuyệt đẹp, tận hưởng dịch vụ chuyên nghiệp và đa dạng các hoạt động thú vị.</div>
            <a class="a-more" href="">Xem thêm</a>
        </div>
        <div class="card quocgia col-lg-4 col-6 text-left maunen" id="quocgiaList">
            <a href="">
                <img src="anh/Amanbagh, India - Accomodation, Pool Pavilion Exterior.jpg" alt="">
                <h2>Philippines</h2>
            </a>
            <div class="info-card">
                From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a
                Moroccan oasis, these Aman destinations offer unique perspectives of Europe and North Africa.
            </div>
            <a class="a-more" href="">Xem thêm</a>
        </div> -->
        <!-- <div class=" card quocgia col-lg-4 quocgia col-6 text-left maunen">
            <a href="sanpham-Sin.html">
                <img src="quocgia/sin.jpg" alt="">
                <h2>Singapo</h2>
            </a>
            <div class="info-card">
                From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a
                Moroccan oasis, these Aman destinations offer unique perspectives of Europe and North Africa.
            </div>
            <a class="a-more" href="">Xem thêm</a>
        </div>
        <div class=" card quocgia col-lg-4 col-6 text-left maunen">
            <a href="sanpham.html">
                <img src="anh/Amanzoe, Greece - Main Swimming Pool.jpg" alt="">
                <h2>Myanmar</h2>
            </a>
            <div class="info-card">
                From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a
                Moroccan oasis, these Aman destinations offer unique perspectives of Europe and North Africa.
            </div>
            <a class="a-more" href="">Xem thêm</a>
        </div> -->

        <div class="col-12 text-center">
            <button id="toggleBtn" class="btn mx-auto mt-4 p-0 ">Xem thêm</button>
        </div>
    </div>
    <!-- chủ đề du lịch "dùng slick slider" -->
    <div class=" container-fluid pr-0 diaDiemNoiBat cach">

        <?php foreach ($loaihinhData as $loaihinh) : ?>

            <div class="diaDiemNoiBat-item m-0 p-0 text-center">
                <img src="<?php echo "cms/" . $loaihinh['ANHLOAIHINH']; ?>" alt="">
                <p class="subtitle"><?php echo $loaihinh['TENLOAIHINH']; ?></p>
                <h3 class="heading-h"><?php echo $loaihinh['titleloaihinh']; ?></h3>
                <div class="info-card"><?php echo $loaihinh['MOTALOAIHINH']; ?></div>
            </div>

        <?php endforeach; ?>

        <!-- <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="loaihinh/bien.jpg" alt="">
            <p class="subtitle">biển</p>
            <h3 class="heading-h">Cạnh các bải biển đẹp</h3>
            <div class="info-card">
                Bất động sản trên khắp Indonesia, Lào, Việt Nam,.. và trên hòn đảo xa xôi của Philippines, mang đến cho
                du khách một góc nhìn mới về cảnh quan đa dạng.</div>
        </div> -->
        <!-- <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="loaihinh/tp.jpg" alt="">
            <p class="subtitle">thành phố</p>
            <h3 class="heading-h">Các thành phố nổi tiếng</h3>
            <div class="info-card">
                Tại các thành phố nổi tiếng của các nước Đông Nam á chúng tôi tự hào có hệ thống bất động sản nghỉ dưỡn
                du lịch hiện đại và hoành tráng bậc nhất khu vực</div>
        </div>
        <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="loaihinh/nui.jpg" alt="">
            <p class="subtitle">núi</p>
            <h3 class="heading-h">Nghỉ dưỡng và trượt tuyết</h3>
            <div class="info-card">
                Vào mùa đông ở các cùng núi cao bắt đầu diễn ra các hoạt đông trượt tuyết, ... hấp dẫn Hãy cùng chúng
                tôi tậng hưởng bầu không khí trong lanh và thoải mái </div>
        </div>
        <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="loaihinh/vila.jpg" alt="">
            <p class="subtitle">biệt thự</p>
            <h3 class="heading-h">Kì nghỉ sang trong</h3>
            <div class="info-card">
                Chúng tôi tự hào là 1 trong những đơn vị sỡ hữu nhiều villas nhất và chất lương nhất trong khu vựa, đem
                lại sự sang trọng và thoải mái cho du khách đến đây</div>
        </div>
        <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="loaihinh/trai.jpg" alt="">
            <p class="subtitle">cắm trại</p>
            <h3 class="heading-h">Trải nghiệm sự hoang dã</h3>
            <div class="info-card">
                Fringing the ocean and embracing a freer pace of life, Aman’s coastal retreats are spring sanctuaries,
                whether seeking romance, reconnection or a serene time out.</div>
        </div>
        <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="loaihinh/le.jpg" alt="">
            <p class="subtitle">lễ hội</p>
            <h3 class="heading-h">Những lễ hội truyền thống</h3>
            <div class="info-card">
                Lễ hội là một trong những thứ không thể thiếu ở các nước đông nam á nó là net văn hóa đặc trưng thể hiện
                truyền thống của mỗi quôc gia hãy cùng chúng tôi khám phám nó </div>
        </div>
        <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="loaihinh/bien.jpg" alt="">
            <p class="subtitle">đảo</p>
            <h3 class="heading-h">Những quần đảo đẹp</h3>
            <div class="info-card">
                Fringing the ocean and embracing a freer pace of life, Aman’s coastal retreats are spring sanctuaries,
                whether seeking romance, reconnection or a serene time out.</div>
        </div>
        <div class="diaDiemNoiBat-item m-0 p-0 text-center">
            <img src="anh/trai.jpg" alt="">
            <p class="subtitle">beach</p>
            <h3 class="heading-h">By the coast</h3>
            <div class="info-card">
                Fringing the ocean and embracing a freer pace of life, Aman’s coastal retreats are spring sanctuaries,
                whether seeking romance, reconnection or a serene time out.</div>
        </div> -->
    </div>
    <!-- giới thiệu dịch vụ -->
    <div class="container-fluid dichvu row justify-content-around cach m-0 p-0 maunen">
        <div class="card col-lg-4 col-12 text-left maunen">
            <img src="anh/22-11-Amanbagh-Amansanti-Musician-0621.jpg" alt="">
            <h4 style="font-size:medium; margin: 8px 0 0 0">KHÁM PHÁ</h4>
            <h3>Khám phá nét văn hóa bản địa</h3>
            <div class="info-card">
                Trải nghiệm các hoạt động và sự kiện mang đậm tính truyền thống, khám phá nghệ thuật, âm nhạc và múa dân
                gian độc đáo. Tham gia vào các buổi thuyết trình về lịch sử và văn hóa địa phương, thưởng thức ẩm thực
                đặc sản đậm chất địa phương và tham gia vào các hoạt động thể thao truyền thống. </div>
            <a class="a-more" href="khampha.html">Xem thêm</a>
        </div>
        <div class="card col-lg-4 col-12 text-left  maunen">
            <img src="anh/Janu, Brand, Hotels.jpg" alt="">
            <h4 style="font-size:medium; margin: 8px 0 0 0">ABOUT US</h4>
            <h3>Trải nghiệm những chuyến đi bất tận</h3>
            <div class="info-card">
                Đắm mình trong vẻ đẹp hoang sơ của thiên nhiên, khám phá những hòn đảo tuyệt đẹp và bãi biển trải dài.
                Thư giãn trong không gian yên bình và tận hưởng những dịch vụ sang trọng. Trải nghiệm các hoạt động
                phiêu lưu như lặn biển, đi thuyền, leo núi và khám phá rừng rậm.</div>
            <a class="a-more" href="khampha.html">Xem thêm</a>
        </div>
        <div class="card col-lg-4  col-12 text-left maunen">
            <img src="anh/aman_essentials_-_spring_seasonal_skincare_.jpg" alt="">
            <h4 style="font-size:medium; margin: 8px 0 0 0">ABOUT US</h4>
            <h3>Sử dụng những sản phẩm chất lượng</h3>
            <div class="info-card">
                Chúng tôi tự hào cung cấp những sản phẩm chất lượng tại resort của chúng tôi. Từ những phòng nghỉ sang
                trọng và tiện nghi đến các dịch vụ spa, nhà hàng và tiệc cưới, chúng tôi cam kết mang đến trải nghiệm
                tốt nhất cho khách hàng. </div>
            <a class="a-more" href="khampha.html">Xem thêm</a>
        </div>
    </div>
    <!-- câu chuyện nổi bật -->
    <div class="container-fluid text-center cach">
        <h2 class="heading-h story-h2">Câu chuyện nổi bật</h2>
    </div>
    <div class="container-fluid row story cach m-0">
        <div class="col-lg-8 p-0">
            <a href="blog.html">
                <img src="anh/do_not_use_-_chris_colls_imagery_10.jpg" alt="" class="img-fluid w-100">
            </a>
        </div>
        <div class="col-lg-4 story-info p-0 justify-content-between">
            <div>
                <p>MEDITATION | MAY 2023</p>
                <h3>Khát vọng Việt Nam</h3>
                <p>Toàn thế giới cũng như Việt Nam lao đao vì dịch bệnh, trong hoàn cảnh đó, vẫn có “ánh sáng kì diệu”
                    xuất phát từ những người Việt tử tế, tài giỏi, luôn mang trong mình khát vọng cống hiến cho cộng
                    đồng. 10 nhân vật đặc biệt xuất hiện trong "Khát vọng Việt Nam" - chương trình của VTV và VPBank,
                    mang đến những câu chuyện riêng. Dù mỗi người có hành trình riêng nhưng họ đều có chung một khát
                    vọng to lớn: góp sức xây dựng đất nước giàu đẹp.</p>
            </div>
            <div class="rMore">
                <a href="blog.html">Đọc thêm</a>
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
                    //entry.target.play(); // Chạy video khi nó hiển thị trên màn hình
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
    <script src="app.js"></script>
</body>

</html>