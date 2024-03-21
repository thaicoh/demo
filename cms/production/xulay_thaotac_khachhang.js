$(document).ready(function () {

    var trangThai = 0;

    $('.btnLuu').prop('disabled', true);
    $('.btnSua').prop('disabled', true);
    $('.btnXoa').prop('disabled', true);

    $('.btnThem').click(function (e) {
        $('.btnThem').prop('disabled', true);
        $('.btnThem').addClass('.disabled_btn')
        $('#malh').val('')
        $('#malh').focus()
        $('#tenlh').val('')
        $('#emailkh').val('')
        $('#sdtkh').val('')
        $('#gt').val('')
        $('#mk').val('')
        $('.btnLuu').prop('disabled', false);
        trangThai = 1;
    });

    $('.btnTaoLai').click(function (e) {
        $('.btnThem').prop('disabled', false);
        $('.btnThem').addClass('.disabled_btn')
        $('#malh').val('')
        $('#malh').focus()
        $('#tenlh').val('')
        $('#emailkh').val('')
        $('#sdtkh').val('')
        $('#gt').val('')
        $('#mk').val('')
        $('.btnLuu').prop('disabled', true);
        trangThai = 0;
    });

    // khi nhan nut luu
    $(".btnLuu").click(function () {
        var maKH = $("#malh").val();
        var tenKH = $("#tenlh").val();
        var emailKH = $("#emailkh").val();
        var sdtKH = $("#sdtkh").val();
        var gioiTinh = $("#gt").val();
        var matKhauKH = $("#mk").val();

        if (maKH == '' || tenKH == '' || emailKH == '' || sdtKH == '' || gioiTinh == '' || matKhauKH == '') {
            bootbox.alert("Vui lòng điền đầy đủ thông tin!");
            return; // Dừng việc thực hiện tiếp nếu thiếu thông tin
        }
        
        if (trangThai == 1) {
            console.log("them du lieu ");
            var datasend = {
                maKH: $("#malh").val(),
                tenKH: $("#tenlh").val(),
                emailKH: $("#emailkh").val(),
                sdtKH: $("#sdtkh").val(),
                gioiTinh: $("#gt").val(),
                matKhauKH: $("#mk").val(),
                anhKH: ""
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/insert_khachhang.php", datasend, function (res) {
                console.log(res);
                if (res.success == 1) {
                    bootbox.alert("Thêm thành công!");
                    loadLoaiHoa(0, record);
                    
                }
                else if (res.success == 0) {
                    bootbox.alert("Không thể kết nối với server!");
                }
                else {
                    bootbox.alert("Trùng mã khách hàng!" );
                }
            })
        } else if (trangThai == 2) {
            var datasend = {
                maKH: $("#malh").val(),
                tenKH: $("#tenlh").val(),
                emailKH: $("#emailkh").val(),
                sdtKH: $("#sdtkh").val(),
                gioiTinh: $("#gt").val(),
                matKhauKH: $("#mk").val()
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/update_khachhang.php", datasend, function (res) {
                console.log("chayyyyy")
                console.log(res);
                if (res.success == 1) {
                    /// alert("Thêm thành công");
                    bootbox.alert('Update dữ liệu vào thành công!');
                    loadLoaiHoa(0, record);
                } else if (res.success == 0) {
                    // alert("Thất bại.");
                    bootbox.alert('Update dữ liệu vào thất bại!');
                    console.log("lỗi : ", res.error)
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
                queryDataPost("../php/delete_khachhang.php", datasend, function (res) {
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
        var email = $(this).attr("data-email");
        var mk = $(this).attr("data-mk");
        var sdt = $(this).attr("data-sdt");
        var gt = $(this).attr("data-gt");

        console.log(malh)
        console.log(tenlh)
        console.log(email)
        console.log(sdt)
        console.log(gt)

        $('#malh').val(malh)
        $('#tenlh').val(tenlh)
        $('#emailkh').val(email)
        $('#sdtkh').val(sdt)
        $('#gt').val(gt)
        $('#mk').val(mk)

        trangThai = 2;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

})
