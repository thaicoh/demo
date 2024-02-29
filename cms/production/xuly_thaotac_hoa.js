$(document).ready(function () {

    var trangThai = 0;

    $('.btnLuu').prop('disabled', true);
    $('.btnSua').prop('disabled', true);
    $('.btnXoa').prop('disabled', true);

    // nut dong modal
    $(".btnclosenxb").click(function () {
        $('.shownxb').modal('hide');
    })

    $(".close").click(function () {
        $('.shownxb').modal('hide');
    })

    // nut dong modal
    $(".btnclosenxb").click(function () {
        $('.showkm').modal('hide');
    })

    $(".close").click(function () {
        $('.showkm').modal('hide');
    })



    $('.btnThem').click(function (e) {
        $('.btnThem').prop('disabled', true);
        $('.btnThem').addClass('.disabled_btn')
        $('#txtmahoa').focus()
        $('#txtmahoa').val('')
        $('#txttenhoa').val('')
        $('#txtgiaban').val('')
        $('#txtsoluong').val('')
        $('#txttenhoa').val('')
        $('#txtmota').val('')

        $('.btnLuu').prop('disabled', false);
        trangThai = 1;
    });

    $('.btnTaoLai').click(function (e) {
        $('.btnThem').prop('disabled', false);
        $('.btnThem').addClass('.disabled_btn')
        $('#txtmahoa').val('')
        $('#txtmahoa').focus()
        $('#txttenhoa').val('')
        $('.cbloaihoa').val('')
        $('.cbkhuyenmai').val('')
        $('#txtgiaban').val('')
        $('#txtsoluong').val('')
        $('#txtmota').val('')

        $('.btnLuu').prop('disabled', true);
        trangThai = 0;
    });

    $(".loadhoa").on('click', '.click_loaihoa', function () {
        var maloaihoa = $(this).attr("data-mah");
        console.log(maloaihoa)
        var datasend = {
            maloaihoa: maloaihoa
        }
        console.log("chay")
        queryDataPost("../php/data_get_the_loai.php", datasend, function (res) {
            console.log("res1", res.items)

            $('.shownxb').modal('show');
            var ar = res.items;

            $(".addmaloaihoa").html(ar[0].MALOAIHOA);
            $(".addtenloaihoa").html(ar[0].TENLOAIHOA);
            $(".addmotaloaihoa").html(ar[0].MOTALOAIHOA);
            $(".addanhloaihoa").html(

                `<div><img src="images/${ar[0].ANHLOAIHOA}" alt="Lamp" width="200" height="100"></div>`
            );
        })
    })

    $(".loadhoa").on('click', '.click_khuyenmai', function () {
        var makhuyenmai = $(this).attr("data-makm");
        console.log(makhuyenmai)
        var datasend = {
            makhuyenmai: makhuyenmai
        }
        console.log("chay")

        if (makhuyenmai != '') {
            queryDataPost("../php/data_get_khuyenmai.php", datasend, function (res) {
                console.log("res2", res.items)

                $('.showkm').modal('show');
                var ar = res.items;

                $(".addmakm").html(ar[0].MAKHUYENMAI);
                $(".addtenkm").html(ar[0].TENKHUYENMAI);
                $(".addmotakm").html(ar[0].MOTA);
                $(".addngaybatdau").html(ar[0].NGAYBATDAU);
                $(".addngayketthuc").html(ar[0].NGAYKETTHUC);
                $(".addtile").html(ar[0].TILEKHUYENMAI);
            })
        } else {
            alert("Không có khuyến mãi!")
        }
    })




    // khi nhan nut luu
    $(".btnLuu").click(function () {
        if (trangThai == 1) {
            console.log("them du lieu ");
            var duongDanHinhAnh = $("#img").val(); // Đường dẫn hình ảnh
            var tenHinhAnh = duongDanHinhAnh.replace(/^.*[\\\/]/, ''); // Trích xuất phần tên đường dẫn
            console.log(tenHinhAnh); // In ra tên hình ảnh
            var datasend = {

                mahoa: $("#txtmahoa").val(),
                tenhoa: $("#txttenhoa").val(),
                soluong: $("#txtsoluong").val(),
                gia: $("#txtgiaban").val(),
                maloaihoa: $(".cbloaihoa").val(), // 
                makhuyenmai: $(".cbkhuyenmai").val(), // 
                motahoa: $("#txtmota").val(),
                anhloaihoa: tenHinhAnh
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log("datasend", datasend);
            queryDataPost("../php/insert_hoa.php", datasend, function (res) {
                console.log(res);
                if (res.success == 1) {
                    bootbox.alert("Thêm thành công!");
                    loadHoa(0, record);
                }
                else if (res.success == 0) {
                    bootbox.alert("Không thể kết nối với server!");
                }
                else {
                    bootbox.alert("Trùng mã loại hoa!");
                }
            })
        } else if (trangThai == 2) {

            console.log("chay cap nhat")
            var datasend = {

                maHoa: $("#txtmahoa").val(),
                tenHoa: $("#txttenhoa").val(),
                soLuongCon: $("#txtsoluong").val(),
                giaHoa: $("#txtgiaban").val(),
                maLoaiHoa: $(".cbloaihoa").val(), // 
                maKhuyenMai: $(".cbkhuyenmai").val(), // 
                moTaHoa: $("#txtmota").val(),
                anhHoa: $('#img').attr("data-anh")

            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/update_hoa.php", datasend, function (res) {
                console.log(res);
                if (res.success == 1) {
                    /// alert("Thêm thành công");
                    bootbox.alert('update dữ liệu vào thành công!');
                    loadHoa(0, record);
                } else if (res.success == 0) {
                    // alert("Thất bại.");
                    bootbox.alert('Thêm dữ liệu vào thất bại!');
                }
            })
        } else {
            console.log("chua chon thao tac ");
        }
    })

    $('.loadhoa').on('click', '.btn-xoa', function () {
        var malh = $(this).attr("data-mah");
        var makm = $(this).attr("data-makm");
        console.log(malh)
        bootbox.confirm('Bạn có chắc muốn xóa?', function (result) {
            if (result == true) {
                var datasend = {
                    malh: malh
                }
                queryDataPost("../php/delete_hoa.php", datasend, function (res) {
                    console.log(res);
                    if (res.success == 1) {
                        bootbox.alert("Xóa thành công!");
                        loadHoa(0, record);
                    }
                    else if (res.success == 0) {
                        bootbox.alert("Lỗi!");
                    }
                    else {
                        bootbox.alert("Lỗi!");
                    }
                })

            } else {

            }
        });
    });

    $('.loadhoa').on('click', '.btn-sua', function () {

        $('.btnLuu').prop('disabled', false);
        $('.btnSua').prop('disabled', true);
        $('.btnXoa').prop('disabled', false);
        $('.btnThem').prop('disabled', true);

        var malh = $(this).attr("data-malh");
        var tenh = $(this).attr("data-tenh");
        var mota = $(this).attr("data-mota");
        var gia = $(this).attr("data-gia");
        var anh = $(this).attr("data-anh");
        var mah = $(this).attr("data-mah");
        var makm = $(this).attr("data-makm");
        var sl = $(this).attr("data-sl");

        console.log(malh)
        console.log(tenh)
        console.log(mota)
        console.log(mah)
        console.log(makm)
        console.log(sl)
        console.log(`images/${anh}`)

        $('#txtmahoa').val(mah)
        $('#txttenhoa').val(tenh)
        $('#txtmota').val(mota)
        $('#txtsoluong').val(sl)
        $('#txtgiaban').val(gia)
        $('#txtmota').val(mota)

        $('.cbloaihoa').val(malh)
        $('.cbkhuyenmai').val(makm)

        $('#img').attr('data-anh', `${anh}`);

        trangThai = 2;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

})
