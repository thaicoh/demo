$(document).ready(function () {

    // $('#birth-date').mask('00/00/0000');
    // $('#phone-number').mask('0000-0000');
    
    var trangThai = 0;
    
    $('.btnLuu').prop('disabled', true);
    $('.btnSua').prop('disabled', true);
    $('.btnXoa').prop('disabled', true);

    $('.btnThem').click(function (e) {
        $('.btnThem').prop('disabled', true);
        console.log("chay")
        $('.btnThem').addClass('.disabled_btn')
        $('#malh').val('')
        $('#malh').focus()
        $('#tenlh').val('')
        $('#des').val('')
        $('.btnLuu').prop('disabled', false);
        trangThai = 1;
    });

    $('.btnTaoLai').click(function (e) {
        $('.btnThem').prop('disabled', false);
        $('.btnThem').addClass('.disabled_btn')
        $('#malh').val('')
        $('#malh').focus()
        $('#tenlh').val('')
        $('#des').val('')
        $('.btnLuu').prop('disabled', true);
        trangThai = 0;
    });

    // khi nhan nut luu
    $(".btnLuu").click(function () {
        if (trangThai == 1) {
            console.log("them du lieu ");
            var duongDanHinhAnh = $("#img").val(); // Đường dẫn hình ảnh
            var tenHinhAnh = duongDanHinhAnh.replace(/^.*[\\\/]/, ''); // Trích xuất phần tên đường dẫn
            console.log(tenHinhAnh); // In ra tên hình ảnh
            var datasend = {
                maloaihoa: $("#malh").val(),
                tenloaihoa: $("#tenlh").val(),
                motaloaihoa: $("#des").val(),
                anhloaihoa: tenHinhAnh
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/insert_loaihoa.php", datasend, function (res) {
                console.log(res);
                if (res.success == 1) {
                    bootbox.alert("Thêm thành công!");
                    loadLoaiHoa(0, record);
                }
                else if (res.success == 0) {
                    bootbox.alert("Không thể kết nối với server!");
                }
                else {
                    bootbox.alert("Trùng mã loại hoa!");
                }
            })
        } else if (trangThai == 2) {

            var datasend = {
                malh: $("#malh").val(),
                tenlh: $("#tenlh").val(),
                mota: $("#des").val(),
                anh: $('#img').attr("data-anh")
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/update_loaihoa.php", datasend, function (res) {
                console.log(res);
                if (res.success == 1) {
                    /// alert("Thêm thành công");
                    bootbox.alert('update dữ liệu vào thành công!');
                    loadLoaiHoa(0, record);
                } else if (res.success == 0) {
                    // alert("Thất bại.");
                    bootbox.alert('Thêm dữ liệu vào thất bại!');
                }
            })
        } else {
            console.log("chua chon thao tac ");
        }
    })

    $('.load_LoaiHoa').on('click', '.btn-xoa', function () {
        var malh = $(this).attr("data-malh");
        console.log(malh)
        bootbox.confirm('Bạn có chắc muốn xóa?', function (result) {
            if (result == true) {
                var datasend = {
                    malh: malh
                }
                queryDataPost("../php/delete_loaihoa.php", datasend, function (res) {
                    console.log(res);
                    if (res.success == 1) {
                        bootbox.alert("Xóa thành công!");
                        loadLoaiHoa(0, record);
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

    $('.load_LoaiHoa').on('click', '.btn-sua', function () {

        $('.btnLuu').prop('disabled', false);
        $('.btnSua').prop('disabled', true);
        $('.btnXoa').prop('disabled', false);
        $('.btnThem').prop('disabled', true);

        var malh = $(this).attr("data-malh");
        var tenlh = $(this).attr("data-tenlh");
        var mota = $(this).attr("data-mota");
        var anh = $(this).attr("data-anh");
        console.log(malh)
        console.log(tenlh)
        console.log(mota)
        console.log(`images/${anh}`)

        $('#malh').val(malh)
        $('#tenlh').val(tenlh)
        $('#des').val(mota)
        $('#img').attr('data-anh', `${anh}`);
        trangThai = 2;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

})
