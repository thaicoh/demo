<?php
// Thêm header để vô hiệu hóa cache
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");


// Kiểm tra xem cookie 'role' có tồn tại không
if (isset($_COOKIE['role'])) {
  // Lấy giá trị của cookie 'role'
  $role = $_COOKIE['role'];

  // Kiểm tra giá trị của cookie 'role'
  if ($role === '1') {
  } else {
    // Nếu không phải admin, chuyển hướng đến trang khác
    header('Location: ../../index.php');
    exit;
  }
} else {
  // Nếu cookie 'role' không tồn tại, chuyển hướng đến trang khác
  header('Location: ../../index.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />
  <link href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="../../stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">





  <title>Gentelella Alela!</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="style.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->


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
      right: 20px;
      bottom: calc(0% + 29px);
      color: rgb(94, 94, 94);
      bottom: 8px;
      font-size: 20px !important;

    }

    .fa-eye {
      position: absolute;
      right: 20px;
      bottom: calc(0% + 29px);
      bottom: 8px;
      color: rgb(94, 94, 94);
      font-size: 20px !important;
    }

    .hidden {
      display: none !important;
    }

    a {
      color: #253325;
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

    /*  */
  </style>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"> <img src="images/logo1.png" style="object-fit: cover; width: 30%; height: 80%; border-radius: 50%;" /> <span>Bán
                hoa</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="images/IMG_2030.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>mr. Học</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3></h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Trang chủ <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.php">Resort</a></li>
                    <li><a href="hoa1.php">Khu nghỉ dưỡng</a></li>
                    <li><a href="index2.php">Khách hàng</a></li>
                    <li><a href="quocgia.php">Quốc gia</a></li>
                    <li><a href="nhacungcap1.php">Loại nghỉ dưỡng</a></li>
                    <li><a href="nhacungcap1.php">Đặt Phòng</a></li>
                    <!-- <li><a href="khachhang.html"></a></li> -->

                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i> Nghiệp vụ <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="form.html">Tạo đơn hàng</a></li>
                    <li><a href="form_advanced.html">Xem đơn hàng</a></li>

                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i>Thống kê <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="form.html">Doanh thu theo ngày</a></li>
                    <li><a href="form_advanced.html">Doanh thu theo từ ngày đến ngày </a></li>

                  </ul>
                </li>

              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/IMG_2030.jpg" alt="">Mr. Học
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                  <a class="dropdown-item logout" href="login.html"><i class="fa fa-sign-out pull-right"></i>
                    Log Out</a>
                </div>
              </li>

              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were
                        where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were
                        where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were
                        where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were
                        where...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <div class="text-center">
                      <a class="dropdown-item">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;">
          <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last
                Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last
                Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last
                Week</span>
            </div>
          </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cập Nhật Khách Hàng<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a class="dropdown-item" href="#">Settings 1</a>
                          </li>
                          <li><a class="dropdown-item" href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="malh">Mã khách hàng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="malh" name="malh" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tenlh">Tên khách hàng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="tenlh" name="tenlh" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tenlh">Số điện thoại khách hàng
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="sdtkh" name="sdtkh" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tenlh">Email khách hàng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="emailkh" name="emailkh" required="required" class="form-control">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tenlh">Giới tính<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <select class=" form-control form-select col-md-12 h-100" id="gt" name="gt" selected="false">
                            <option disabled="" selected="" value=""> -- Chọn giới tính --
                            </option>
                            <option value="null">Null</option>
                            <option value="0">Nữ</option>
                            <option value="1">Nam</option>

                          </select>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="mk">Mật khẩu khách hàng
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" id="mk" name="password" class="form-control">
                          <i class="fa fa-eye" style="display: none;"></i>
                          <i class="fa fa-eye-slash" style="display: none;"></i>
                          <small></small>
                        </div>
                      </div>

                      <script>
                        var passwordInput = document.querySelector("#mk");
                        var eye1 = document.querySelector('.fa-eye');
                        var eye2 = document.querySelector('.fa-eye-slash');

                        var togglePasswordVisibility = () => {
                          if (passwordInput.value !== '') {
                            eye1.style.display = 'inline-block';
                            eye2.style.display = 'inline-block';
                          } else {
                            eye1.style.display = 'none';
                            eye2.style.display = 'none';
                          }
                        };

                        var togglePasswordType = () => {
                          if (passwordInput.type === 'text') {
                            passwordInput.type = 'password';
                            eye2.style.display = 'none';
                            eye1.style.display = 'inline-block';
                          } else {
                            passwordInput.type = 'text';
                            eye1.style.display = 'none';
                            eye2.style.display = 'inline-block';
                          }
                        };

                        eye1.addEventListener('click', togglePasswordType);
                        eye2.addEventListener('click', togglePasswordType);

                        passwordInput.addEventListener('input', togglePasswordVisibility);

                        togglePasswordVisibility(); // Kiểm tra trạng thái ban đầu
                      </script>


                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="img">Ảnh khách hàng<span class="required">*</span>
                      </label>
                      <input type="file" style="padding: 10px;" id="uploadInput" name="uploadInput" accept="image/*">
                      <div>
                        <div id='previewContainer' style="max-width: 50%;">
                          <img id="previewImage" style="max-width: 100%;" src="">
                          <button id="chooseAgainButton" style="display: none;">X</button>
                        </div>

                      </div>

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
                      <div class="ln_solid"></div>
                      <div class="item form-group justify-content-center" style="color: white !important">
                        <div class="col-md-6 col-sm-6 offset-md-3 ">
                          <button class="btn btn-danger btnThem" type="button"><i class="fa fa-plus mr-1">
                            </i>Thêm</button>
                          <button class="btn btn-danger btnXoa" type="button"><i class="fa fa-trash mr-1"> </i>
                            Xóa</button>
                          <button class="btn btn-danger btnLuu" type="button"><i class="fa fa-check mr-1"> </i>
                            Lưu</button>
                          <button type="submit" class="btn btn-danger btnSua" style="color: white !important"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                          <button class="btn btn-danger btnTaoLai" type="reset"><i class="fa fa-refresh mr-1"> </i>Tạo
                            lại</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- bang data -->
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="row">
              <div class="col-md-12 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách tìm kiếm khách hàng <small></small></h2>
                    <input type="text" class="form-control" id="inp-search" placeholder="Tìm kiếm...">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="#">Settings 1</a>
                          <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Ảnh KH</th>
                          <th>Mã khách hàng</th>
                          <th>Tên khách hàng</th>
                          <th>Số điện thoại khách hàng</th>
                          <th>Email khách hàng</th>
                          <th>Vai trò KH</th>
                          <th>Giới tính</th>
                          <!-- <th>Mật khẩu khách hàng</th> -->
                        </tr>
                      </thead>
                      <tbody class="load_LoaiHoa">
                        <tr>
                          <th scope="row">1</th>
                          <th></th>
                          <td>123QWE</td>
                          <td>Học</td>
                          <td>1234567890</td>
                          <td>Hoc@gmail.com</td>
                          <td class="d-flex justify-content-between">@Qwer123
                            <div class="thaotac ">
                              <button class="btn-danger"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                              <button class="btn-danger"><i class="fa fa-trash mr-1">
                                </i>Xóa</button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <th></th>
                          <td>133QWE</td>
                          <td>Sơn</td>
                          <td>2345678901</td>
                          <td>Son@gmail.com</td>
                          <td class="d-flex justify-content-between">@Qwer234
                            <div class="thaotac ">
                              <button class="btn-danger"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                              <button class="btn-danger"><i class="fa fa-trash mr-1">
                                </i>Xóa</button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <th></th>
                          <td>143QWE</td>
                          <td>Huy</td>
                          <td>3456789012</td>
                          <td>Huy@gmail.com</td>
                          <td class="d-flex justify-content-between">@Qwer345
                            <div class="thaotac ">
                              <button class="btn-danger"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                              <button class="btn-danger"><i class="fa fa-trash mr-1"></i>Xóa</button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <th></th>
                          <td>153QWE</td>
                          <td>Xuân</td>
                          <td>4567890123</td>
                          <td>Xuan@gmail.com</td>
                          <td class="d-flex justify-content-between">@Qwer456
                            <div class="thaotac ">
                              <button class="btn-danger"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                              <button class="btn-danger"><i class="fa fa-trash mr-1"></i>Xóa</button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
            <div class="pagenumbernv">

            </div>

            <!-- The Modal -->
            <div class="modal shownxb" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Thông tin khách hàng</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <table class="table">
                      <tr>
                        <td>Mã Khách Hàng</td>
                        <td class="addmaloaihoa"></td>
                      </tr>
                      <tr>
                        <td>Tên Loại Hoa</td>
                        <td class="addtenloaihoa"></td>
                      </tr>
                      <tr>
                        <td>Mô tả loại hoa</td>
                        <td class="addmotaloaihoa"></td>
                      </tr>
                      <tr>
                        <td>Ảnh loại hoa</td>
                        <td class="addanhloaihoa">

                        </td>
                      </tr>

                    </table>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btnclosenxb" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>



            <!-- The Modal -->
            <div class="modal showkm" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Thông tin Khuyến mãi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <table class="table">
                      <tr>
                        <td>Mã khuyến mãi</td>
                        <td class="addmakm"></td>
                      </tr>
                      <tr>
                        <td>Tên khuyến mãi</td>
                        <td class="addtenkm"></td>
                      </tr>
                      <tr>
                        <td>Mô tả khuyến mãi</td>
                        <td class="addmotakm"></td>
                      </tr>
                      <tr>
                        <td>Ngày bắt đầu</td>
                        <td class="addngaybatdau">
                        </td>
                      </tr>
                      <tr>
                        <td>Ngày kết thúc</td>
                        <td class="addngayketthuc">
                        </td>
                      </tr>

                      <tr>
                        <td>Tỉ lệ khuyến mãi</td>
                        <td class="addtile">
                        </td>
                      </tr>


                    </table>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btnclosenxb" data-dismiss="modal">Close</button>
                  </div>

                </div>
              </div>
            </div>



            <!-- footer content -->


            <footer class="m-0" style="height: 100px;">

              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        </div>


        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="../vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="../vendors/Flot/jquery.flot.js"></script>
        <script src="../vendors/Flot/jquery.flot.pie.js"></script>
        <script src="../vendors/Flot/jquery.flot.time.js"></script>
        <script src="../vendors/Flot/jquery.flot.stack.js"></script>
        <script src="../vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="../vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../vendors/moment/min/moment.min.js"></script>
        <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- <script src="../js/jquery-3.7.1.min.js"></script> -->
        <script src="../js/common.js"></script>
        <script src="xulay_thaotac_khachhang.js"></script>
        <script src="xuly_khachhang.js"></script>
        <script src="js/bootbox/bootbox.all.min.js"></script>
        <!-- <script src="common.js"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
          // $(document).ready(function () {
          //   $('#sel1').select2({
          //     matcher: function (params, data) {
          //       if ($.trim(params.term) === '') {
          //         return data;
          //       }

          //       // Chuyển đổi chuỗi search và phần hiển thị của option sang chữ thường
          //       var term = params.term.toLowerCase();
          //       var text = $(data.element).text().toLowerCase();

          //       // Kiểm tra xem chuỗi search có chứa trong phần hiển thị của option hay không
          //       if (text.indexOf(term) > -1) {
          //         return data;
          //       }

          //       return null;
          //     }
          //   });

          // $('#sel2').select2({
          //     matcher: function (params, data) {
          //         if ($.trim(params.term) === '') {
          //             return data;
          //         }

          //         // Chuyển đổi chuỗi search và phần hiển thị của option sang chữ thường
          //         var term = params.term.toLowerCase();
          //         var text = $(data.element).text().toLowerCase();

          //         // Kiểm tra xem chuỗi search có chứa trong phần hiển thị của option hay không
          //         if (text.indexOf(term) > -1) {
          //             return data;
          //         }

          //         return null;
          //     }
          // });



          //});
        </script>
        <script>
          // Lấy tất cả các cookie và chuyển chúng thành một mảng các cặp key-value
          var cookies = document.cookie.split(';');

          // Tạo một đối tượng để lưu trữ các cookie
          var cookieObject = {};

          // Lặp qua mảng cookie để tách key và value, sau đó lưu vào đối tượng cookieObject
          cookies.forEach(function(cookie) {
            var parts = cookie.split('=');
            var key = parts[0].trim();
            var value = parts[1];
            cookieObject[key] = value;
          });

          var roleCookie = cookieObject['role'];
          console.log(roleCookie);

          function checkCookie(cookieName) {
            var cookies = document.cookie.split(';');

            // Duyệt qua từng cookie để kiểm tra
            for (var i = 0; i < cookies.length; i++) {
              var cookie = cookies[i].trim(); // Loại bỏ dấu cách thừa
              // Kiểm tra xem cookie có bắt đầu bằng cookieName không
              if (cookie.indexOf(cookieName + '=') === 0) {
                return true; // Cookie tồn tại
              }
            }
            return false; // Cookie không tồn tại
          }

          // Sử dụng hàm checkCookie để kiểm tra
          var cookieExists = checkCookie('id');

          if (cookieExists) {
            console.log('Cookie tồn tại.');
          } else {
            console.log('Cookie không tồn tại.');
          }

          function deleteCookie(cookieName) {
            document.cookie = cookieName + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            // Lấy tất cả các cookie và chuyển chúng thành một mảng các cặp key-value
            var cookies = document.cookie.split(';');

            // Tạo một đối tượng để lưu trữ các cookie
            var cookieObject = {};

            // Lặp qua mảng cookie để tách key và value, sau đó lưu vào đối tượng cookieObject
            cookies.forEach(function(cookie) {
              var parts = cookie.split('=');
              var key = parts[0].trim();
              var value = parts[1];
              cookieObject[key] = value;
            });
          }






          $(document).ready(function() {
            // Xử lý sự kiện click vào phần tử .logout
            $('.logout').click(function(event) {
              event.preventDefault();

              event.preventDefault();

              if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
                // Sử dụng hàm deleteCookie để xóa cookie
                deleteCookie('id');
                console.log("đã xóa id")
                localStorage.setItem('isLoggedIn', 'false');
                window.location.href = "../../index.php";
              }
            });
          });
        </script>

</body>

</html>