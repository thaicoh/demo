
function LocResort(datasend) {
    return new Promise(function (resolve, reject) {
        console.log(" datasend LocResort(): ", datasend)

        queryDataPost("php/load_data_resort_booking.php", datasend, function (res) {
            console.log("res Thich: ", res)
            resolve(res);
        });
    });
}


$(document).ready(function () {
    var startDate = $('#daterange').data('daterangepicker').startDate.format('DD/MM/YYYY');
    var endDate = $('#daterange').data('daterangepicker').endDate.format('DD/MM/YYYY');
    var nguoilonValue = parseInt($('.menu-soluongkhach .soluong-container:nth-child(1) .soluong-value').text());
    var treemValue = parseInt($('.menu-soluongkhach .soluong-container:nth-child(2) .soluong-value').text());
    var soluongphong = $('#soluongphong').val();
    console.log('Ngày bắt đầu:', startDate);
    console.log('Ngày kết thúc:', endDate);
    console.log('Số lượng người lớn:', nguoilonValue);
    console.log('Số lượng trẻ em:', treemValue);
    console.log('Số lượng phòng:', soluongphong);

    // Sử dụng moment.js để định dạng lại ngày tháng
    let formattedStartDate = moment(startDate, "DD/MM/YYYY").format('YYYY-MM-DD');
    let formattedEndDate = moment(endDate, "DD/MM/YYYY").format('YYYY-MM-DD');

    // Tạo đối tượng datasend với các giá trị đã định dạng lại
    let datasend = {
        maknd: $('.btn-timphong').attr('data-maknd'),
        checkin: formattedStartDate,
        checkout: formattedEndDate,
        soluongphong: soluongphong,
        soluongnguoi: nguoilonValue + treemValue * 2
    };


    console.log("datasend: ", datasend)

    LocResort(datasend).then(function (res) {
        console.log(res)
        let resortsHTML = ''
        let infoHTML = `
                        <h4>Thông tin lưu trú của bạn</h4>
                        <div class="col-md-6 p-0 mt-2">
                            <p class="font-weight-bold">Nhận phòng</p>
                            <p>Sau 15:00</p>
                        </div>
                        <div class="col-md-6 p-0 mt-2">
                            <p class="font-weight-bold">Trả phòng</p>
                            <p>Trước 12:00</p>
                        </div>
                        <p>Checkin: ${startDate} -  Checkout:${endDate}</p>
                        <p>${nguoilonValue} Người lớn, ${treemValue} Trẻ em <br></p>
                        <p class="TenResort">Bạn Chưa chọn resort nào! </p>
                        <div class="total d-flex justify-content-between w-100">
                            <div>
                                <h4>Tổng tiền: </h4>
                            </div>
                            <div>
                                <h4  class="tongtien" >0.00 USD</h4>
                            </div>
                        </div>
                        
        `

        if (res.success) {
            res.data.forEach(resort => {
                console.log(resort)
                let loaigiuong = (resort.LOAIGIUONG == 1) ? "cỡ lớn" : "cỡ nhỏ";
                resortsHTML = resortsHTML + `
                        <div class="item row">
                            <div class=" thumb col-md-5">
                                <img src="cms/${resort.IMGTHUMP}" alt="">
                            </div>
                            <div class="item-info col-md-7 ">
                                <h2 class="app_heading1">${resort.TENRESORT}</h2>
                                <p> ${resort.SOLUONGGIUONG} Giường ${loaigiuong} , ${resort.DIENTICH}m2</p>
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
                                        <h4>${resort.GIATRENDEM} US$</h4>
                                        <p>Mỗi đêm</p>
                                        <p>Không tính thuế và phí</p>
                                        <div class="btn btn-datphong" data-giatrendem="${resort.GIATRENDEM}" data-maresort="${resort.MARESORT}" data-tenresort="${resort.TENRESORT}">
                                            Đặt ngay
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                `
            });
        } else {
            resortsHTML = 'Khong co resort phu hop!'
        }
        $('.danhsachphong').html(resortsHTML);
        $('.thongtinluutru').html(infoHTML);

        // Nút đặt phòng

        $('.btn-datphong').off('click').click(function (e) {
            // Xóa sự kiện click trước đó của tất cả các phần tử .btn-xacnhan (nếu có)
            $('.btn-xacnhan').off('click');

            console.log("nhấn nút đạt phòng");
            $('.btn-xacnhan').css('display', 'block')
            var maresort = $(this).data('maresort');
            console.log("maresort", maresort)

            // chỉnh tên resort đã chọn và tổng tiền
            $('.TenResort').html(`Resort: ${$(this).data('tenresort')}  -  ${$(this).data('giatrendem')}USD/đêm`);

            // Tính ngày 
            var start = moment(formattedStartDate, "YYYY-MM-DD");
            var end = moment(formattedEndDate, "YYYY-MM-DD");
            var duration = moment.duration(end.diff(start));
            var days = duration.asDays();

            $('.tongtien').html(`${$(this).data('giatrendem') * days}.00 USD`);
            var tongTien = $(this).data('giatrendem') * days;

            $('.btn-xacnhan').click(function () {
                console.log("nhấn nút xac nhan");
                var datasend = {
                    makh: cookieObject['id'],
                    maresort: maresort,
                    checkin: formattedStartDate,
                    checkout: formattedEndDate,
                    soluongnguoi: nguoilonValue + treemValue * 2,
                    tongtien: tongTien

                };
                console.log("datasend: ", datasend) 

                // Gửi yêu cầu AJAX đến máy chủ
                queryDataPost("php/insert_booking.php", datasend, function (res) {
                    // Kết quả trả về từ máy chủ
                    console.log(res); // Giải quyết Promise với kết quả từ máy chủ
                    if (res.status) {
                        $('.btn-xacnhan').css('display', 'none')
                        alert("Bạn đã đặt phòng thành công")
                        location.reload();
                        window.location.href = "lichsu.php";

                    } else {
                        $('.btn-xacnhan').css('display', 'none')
                        alert("Đặt phòng thất bại!")
                        location.reload();
                    }
                });
            })
        })

    });

});




// nút tìm phòng

$('.btn-timphong').click(function (e) {
    e.preventDefault();
    console.log("click nút tìm phòng")
    //console.log($('#daterange').val())
    var startDate = $('#daterange').data('daterangepicker').startDate.format('DD/MM/YYYY');
    var endDate = $('#daterange').data('daterangepicker').endDate.format('DD/MM/YYYY');
    var nguoilonValue = parseInt($('.menu-soluongkhach .soluong-container:nth-child(1) .soluong-value').text());
    var treemValue = parseInt($('.menu-soluongkhach .soluong-container:nth-child(2) .soluong-value').text());
    var soluongphong = $('#soluongphong').val();
    console.log('Ngày bắt đầu:', startDate);
    console.log('Ngày kết thúc:', endDate);
    console.log('Số lượng người lớn:', nguoilonValue);
    console.log('Số lượng trẻ em:', treemValue);
    console.log('Số lượng phòng:', soluongphong);

    // Sử dụng moment.js để định dạng lại ngày tháng
    let formattedStartDate = moment(startDate, "DD/MM/YYYY").format('YYYY-MM-DD');
    let formattedEndDate = moment(endDate, "DD/MM/YYYY").format('YYYY-MM-DD');

    // Tạo đối tượng datasend với các giá trị đã định dạng lại
    let datasend = {
        maknd: $('.btn-timphong').attr('data-maknd'),
        checkin: formattedStartDate,
        checkout: formattedEndDate,
        soluongphong: soluongphong,
        soluongnguoi: nguoilonValue + treemValue * 2
    };


    console.log("datasend: ", datasend)

    LocResort(datasend).then(function (res) {
        console.log(res)
        let resortsHTML = ''
        let infoHTML = `
                        <h4>Thông tin lưu trú của bạn</h4>
                        <div class="col-md-6 p-0 mt-2">
                            <p class="font-weight-bold">Nhận phòng</p>
                            <p>Sau 15:00</p>
                        </div>
                        <div class="col-md-6 p-0 mt-2">
                            <p class="font-weight-bold">Trả phòng</p>
                            <p>Trước 12:00</p>
                        </div>
                        <p>Checkin: ${startDate} -  Checkout:${endDate}</p>
                        <p>${nguoilonValue} Người lớn, ${treemValue} Trẻ em <br></p>
                        <p class="TenResort">Bạn Chưa chọn resort nào! </p>
                        <div class="total d-flex justify-content-between w-100">
                            <div>
                                <h4>Tổng tiền: </h4>
                            </div>
                            <div>
                                <h4  class="tongtien" >0.00 USD</h4>
                            </div>
                        </div>
                        
        `

        if (res.success) {
            res.data.forEach(resort => {
                console.log(resort)
                let loaigiuong = (resort.LOAIGIUONG == 1) ? "cỡ lớn" : "cỡ nhỏ";
                resortsHTML = resortsHTML + `
                        <div class="item row">
                            <div class=" thumb col-md-5">
                                <img src="cms/${resort.IMGTHUMP}" alt="">
                            </div>
                            <div class="item-info col-md-7 ">
                                <h2 class="app_heading1">${resort.TENRESORT}</h2>
                                <p> ${resort.SOLUONGGIUONG} Giường ${loaigiuong} , ${resort.DIENTICH}m2</p>
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
                                        <h4>${resort.GIATRENDEM} US$</h4>
                                        <p>Mỗi đêm</p>
                                        <p>Không tính thuế và phí</p>
                                        <div class="btn btn-datphong" data-giatrendem="${resort.GIATRENDEM}" data-maresort="${resort.MARESORT}" data-tenresort="${resort.TENRESORT}">
                                            Đặt ngay
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                `
            });
        } else {
            resortsHTML = 'Khong co resort phu hop!'
        }
        $('.danhsachphong').html(resortsHTML);
        $('.thongtinluutru').html(infoHTML);

        // Nút đặt phòng

        $('.btn-datphong').off('click').click(function (e) {
            // Xóa sự kiện click trước đó của tất cả các phần tử .btn-xacnhan (nếu có)
            $('.btn-xacnhan').off('click');

            console.log("nhấn nút đạt phòng");
            $('.btn-xacnhan').css('display', 'block')
            var maresort = $(this).data('maresort');
            console.log("maresort", maresort)

            // chỉnh tên resort đã chọn và tổng tiền
            $('.TenResort').html(`Resort: ${$(this).data('tenresort')}  -  ${$(this).data('giatrendem')}USD/đêm`);

            // Tính ngày 
            var start = moment(formattedStartDate, "YYYY-MM-DD");
            var end = moment(formattedEndDate, "YYYY-MM-DD");
            var duration = moment.duration(end.diff(start));
            var days = duration.asDays();

            $('.tongtien').html(`${$(this).data('giatrendem') * days}.00 USD`);
            var tongTien = $(this).data('giatrendem') * days;

            $('.btn-xacnhan').click(function () {
                console.log("nhấn nút xac nhan");
                var datasend = {
                    makh: cookieObject['id'],
                    maresort: maresort,
                    checkin: formattedStartDate,
                    checkout: formattedEndDate,
                    soluongnguoi: nguoilonValue + treemValue * 2,
                    tongtien: tongTien

                };
                console.log("datasend: ", datasend)

                // Gửi yêu cầu AJAX đến máy chủ
                queryDataPost("php/insert_booking.php", datasend, function (res) {
                    // Kết quả trả về từ máy chủ
                    console.log(res); // Giải quyết Promise với kết quả từ máy chủ
                    if (res.status) {
                        $('.btn-xacnhan').css('display', 'none')
                        alert("Bạn đã đặt phòng thành công")
                        location.reload();
                        window.location.href = "lichsu.php";

                    } else {
                        $('.btn-xacnhan').css('display', 'none')
                        alert("Đặt phòng thất bại!")
                        location.reload();
                    }
                });
            })
        })

    });

})

