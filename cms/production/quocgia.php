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
  <link href="style.css" rel="stylesheet">


  <title>Gentelella Alela!</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet"> <!-- iCheck -->
  <link href="style.css" rel="stylesheet">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <style>
        /* Thiết lập kích thước cột địa chỉ */
        .table td:nth-child(4),
        .table th:nth-child(4) {
            width: 25%;
            max-width: 25%;
        }
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

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"> <img src="images/logo1.png"
                style="object-fit: cover; width: 30%; height: 80%; border-radius: 50%;" /> <span>Bán hoa</span></a>
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
                    <li><a href="index.html">Resort</a></li>
                    <li><a href="hoa1.html">Khu nghỉ dưỡng</a></li>
                    <li><a href="index2.html">Khách hàng</a></li>
                    <li><a href="index3.html">Quốc gia</a></li>
                    <li><a href="nhacungcap1.html">Loại nghỉ dưỡng</a></li>
                    <li><a href="nhanvien.html">Blog</a></li>
                    <li><a href="khuyenmai.html">Khuyến mãi</a></li>

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
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="images/IMG_2030.jpg" alt="">Mr. Học
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                  <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>

              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown"
                  aria-expanded="false">
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
                        Film festivals used to be do-or-die moments for movie makers. They were where...
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
                        Film festivals used to be do-or-die moments for movie makers. They were where...
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
                        Film festivals used to be do-or-die moments for movie makers. They were where...
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
                        Film festivals used to be do-or-die moments for movie makers. They were where...
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
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
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
                    <h2>Cập Nhật Quốc Gia<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                          aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left"
                      novalidate="">

                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txtmahoa">Mã Quốc Gia <span
                            class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="txtmahoa" name="malh" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txttenhoa">Tên Quốc Gia <span
                            class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="txttenhoa" name="last-name" required="required" class="form-control">

                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="txttenhoa">Giới Thiệu Quốc Gia
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea type="text" id="des" name="des" rows="10" style="height: 150px;"
                            class="form-control"></textarea>
                        </div>
                      </div>

                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="img">Ảnh khách hàng<span
                          class="required">*</span>
                      </label>
                      <input type="file" style="padding: 10px;" id="uploadInput" name="uploadInput" accept="image/*">
                      <div>
                        <div id='previewContainer' style="max-width: 50%;">
                          <img id="previewImage" style="max-width: 100%;" src="">
                          <button id="chooseAgainButton" style="display: none;">X</button>
                        </div>

                      </div>

                      <script>
                        document.getElementById("uploadInput").addEventListener("change", function (event) {
                          var input = event.target;
                          var reader = new FileReader();
                          reader.onload = function () {
                            var previewImage = document.getElementById("previewImage");
                            previewImage.src = reader.result;
                            document.getElementById("uploadInput").style.display = "none";
                            document.getElementById("chooseAgainButton").style.display = "inline";
                            // document.getElementById("deleteImageButton").style.display = "inline";
                          };
                          reader.readAsDataURL(input.files[0]);
                        });

                        document.getElementById("chooseAgainButton").addEventListener("click", function () {
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
                          <button type="submit" class="btn btn-danger btnSua" style="color: white !important"><i
                              class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
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
                    <h2>Danh Sách Quốc Gia <small></small></h2>
                    <input type="text" class="form-control" id="inp-search" placeholder="Tìm kiếm...">
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                          aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                          <th>    </th>
                          <th>Mã Quốc Gia</th>
                          <th>Tên Quốc Gia</th>
                          <th>Mô tả</th>
                        </tr>
                      </thead>
                      <tbody class="loadhoa">
                        <!-- <tr>
                          <th scope="row">1</th>
                          <td></td>
                          <td>G001</td>
                          <td>Tây Ban Nha</td>

                          <td class="d-flex justify-content-between">Châu Âu
                            <div class="thaotac ">
                              <button class="btn-danger"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                              <button class="btn-danger"><i class="fa fa-trash mr-1">
                                </i>Xóa</button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td></td>
                          <td>G002</td>
                          <td>Indo</td>

                          <td class="d-flex justify-content-between">Châu Á
                            <div class="thaotac ">
                              <button class="btn-danger"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                              <button class="btn-danger"><i class="fa fa-trash mr-1">
                                </i>Xóa</button>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td></td>
                          <td>G003</td>
                          <td>Thái Lan</td>

                          <td class="d-flex justify-content-between">Châu Á
                            <div class="thaotac ">
                              <button class="btn-danger"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                              <button class="btn-danger"><i class="fa fa-trash mr-1">
                                </i>Xóa</button>
                            </div>
                          </td>
                        </tr> -->
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
                    <h4 class="modal-title">Thông tin loại hoa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <table class="table">
                      <tr>
                        <td>Mã Quốc Gia</td>
                        <td class="addmaloaihoa"></td>
                      </tr>
                      <tr>
                        <td>Tên Quốc Gia</td>
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
        <script>
          //selectedFile = document.getElementById("input").files[0];
        </script>

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
        <script src="jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- <script src="../js/jquery-3.7.1.min.js"></script> -->
        <script src="../js/common.js"></script>
        <script src="xuly_thaotac_quocgia.js"></script>
        <!-- <script src="xuly_loaihoa2.js"></script> -->
        <script src="xulyquocgia.js"></script>
        <script src="js/bootbox/bootbox.all.min.js"></script>
        <!-- <script src="common.js"></script> -->

</body>

</html>