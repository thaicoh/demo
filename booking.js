
function LocResort(datasend) {
    return new Promise(function (resolve, reject) {
        console.log(" datasend LocResort(): ", datasend)

        queryDataPost("php/load_data_resort_booking.php", datasend, function (res) {
            console.log("res Thich: ", res)
            resolve(res);
        });
    });
}


// nút tìm phòng
$('.btn-timphong').click(function () {
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
                        <div class="col-md-6 p-0">
                            <p class="font-weight-bold">Nhận phòng</p>
                            <p>Sau 15:00</p>
                        </div>
                        <div class="col-md-6 p-0">
                            <p class="font-weight-bold">Trả phòng</p>
                            <p>Trước 12:00</p>
                        </div>
                        <p>Checkin: ${startDate} -  Checkout:${endDate}</p>
                        <p>${nguoilonValue} Người lớn, ${treemValue} Trẻ em</p>
                        <div class="total d-flex justify-content-between w-100">
                            <div>
                                <h4>Tong: </h4>
                            </div>
                            <div>
                                <h4>0.00 US$</h4>
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
                                <img src="${resort.IMGTHUMP}" alt="">
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
                                        <div class="btn" data-maresort="${resort.MARESORT}">
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

    });
})