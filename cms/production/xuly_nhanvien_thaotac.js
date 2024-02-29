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
        $('#des').val('')
        $('#email').val('')
        $('#sdt').val('')
        $('#ns').val('')
        $('#gt').val('')
        $('.btnLuu').prop('disabled', false);
        trangThai = 1;
    });

    $('.btnTaoLai').click(function (e) {
        $('.btnThem').prop('disabled', false);
        $('.btnThem').addClass('.disabled_btn')
        $('#malh').val('')
        $('#malh').focus()
        $('#tenlh').val('')
        $('#ns').val('')
        $('#des').val('')
        $('#email').val('')
        $('#sdt').val('')
        $('#gt').val('')
        $('.btnLuu').prop('disabled', true);
        trangThai = 0;
    });

    // khi nhan nut luu
    $(".btnLuu").click(function () {
        if (trangThai == 1) {
            console.log("them du lieu ");
            var datasend = {
                maNV: $("#malh").val(),
                tenNV: $("#tenlh").val(),
                diaChiNV: $("#des").val(),
                sdtNV: $("#sdt").val(),
                gtNV: $("#gt").val(),
                emailNV: $("#email").val(),
                nsNV: $("#ns").val()
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/insert_nhanvien.php", datasend, function (res) {
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
                manv: $("#malh").val(),
                tennv: $("#tenlh").val(),
                diachinv: $("#des").val(),
                sdtnv: $("#sdt").val(),
                gtnv: $("#gt").val(),
                emailnv: $("#email").val()  ,
                nsnv: $("#ns").val()
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/update_nhanvien.php", datasend, function (res) {
                console.log("chayyyyy")
                console.log(res);
                if (res.success == 1) {
                    bootbox.alert('update dữ liệu vào thành công!');
                    loadLoaiHoa(0, record);
                } else if (res.success == 0) {
                    // alert("Thất bại.");
                    bootbox.alert('Thêm dữ liệu vào thất bại!');
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
                queryDataPost("../php/delete_nhanvien.php", datasend, function (res) {
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
        var diachi = $(this).attr("data-diachi");
        var email = $(this).attr("data-email");
        var sdt = $(this).attr("data-sdt");
        var gt = $(this).attr("data-gt");
        var ns = $(this).attr("data-ns");

        console.log(malh)
        console.log(tenlh)
        console.log(diachi)
        console.log(email)
        console.log(sdt)
        console.log(gt)
        console.log(ns)

        $('#malh').val(malh)
        $('#tenlh').val(tenlh)
        $('#des').val(diachi)
        $('#email').val(email)
        $('#sdt').val(sdt)
        $('#gt').val(gt)
        $('#ns').val(ns)

        trangThai = 2;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

})
