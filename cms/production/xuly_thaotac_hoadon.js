
function setDefauft() {
    MAKH = "";
    MANV = "";
    cartItems = [];
    $('#madh').val('')
    $('#sel1').select2('val', '');
    $('#sel1').val(null).trigger('change');
    $('#radio2').prop('checked', false);
    $('#radio1').prop('checked', false);
    $('.khachhangvuathem').html('');
    $('#ngaydat').val('');
    $('#des').val('')
    $('.cb_hoa').val('');
    $('#quantity').val('1');
    renderCartItems();
    updateTotalPrice()

    $('.btnThem').addClass('.disabled_btn')
    $('#malh').val('')
    $('#malh').focus()
    $('#tenlh').val('')
    $('#des1').val('')
    $('#email').val('')
    $('#sdt').val('')
    $('#gt').val('')

    loadCbHoa();
    loadCbLoaiHoa();
    loadCbKhuyenMai();
    loadHoa(0, record);
    loadCbLoaiHoa(0, record);


}
$(document).ready(function () {

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

    $('.btnTaoLai').click(function () {
        console.log("tao lai chay1")
        setDefauft();
        trangThai = 0;
    });


    // khi nhan nut luu
    $(".btnLuu").click(function () {
        var datasend = {
            madonhang: $("#madh").val(),
            makh: MAKH,
            manv: MANV,
            ngaydat: $("#ngaydat").val(),
            tonghoadon: cartItems.reduce((acc, item) => acc + item.gia * item.quantity, 0), // 
            ghichu: $("#des").val()
        }

        //dữ liệu chuẩn gửi lên server dạng đối tượng
        console.log("datasend", datasend);
        queryDataPost("../php/insert_donhang.php", datasend, function (res) {
            console.log(res);
            if (res.success == 1) {
                bootbox.alert("Thêm thành công!");
                loadHoa(0, record);
                setDefauft()
            }
            else if (res.success == 0) {
                bootbox.alert("Không thể kết nối với server!");
            }
            else {
                bootbox.alert("Trùng mã loại hoa!");
            }
        })

        cartItems.forEach(item => {
            var datasenditem = {
                madonhang: $("#madh").val(),
                mahoa: item.ma,
                soluong: item.quantity,
                gia: item.quantity * item.gia,
            }

            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log("datasenditem", datasenditem);
            queryDataPost("../php/insert_chitietdonhang.php", datasenditem, function (res) {
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

            var datasendhoa = {
                mahoa: item.ma,
                soluongmua: item.quantity,
            }

            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log("datasenditem", datasenditem);
            queryDataPost("../php/update_soluonghoa.php", datasendhoa, function (res) {
                console.log(res);
                if (res.success == 1) {
                    bootbox.alert("updete slh thanh cong!");
                    loadHoa(0, record);
                }
                else if (res.success == 0) {
                    bootbox.alert("Không thể kết nối với server!");
                }
                else {
                    bootbox.alert("Trùng mã loại hoa!");
                }
            })


        });

    })

    $('.load_LoaiHoa').on('click', '.btn-xoa', function () {

        var madh = $(this).attr("data-madh");
        bootbox.confirm('Bạn có chắc muốn xóa?', function (result) {
            if (result == true) {
                var datasend = {
                    mahoadon: madh
                }
                queryDataPost("../php/delete_donhang.php", datasend, function (res) {
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

    $('.load_LoaiHoa').on('click', '.btn-xem', function () {
        console.log("chay xem chi tiettiet")
        var madh = $(this).attr("data-mah");
        var manv = $(this).attr("data-manv");
        var tennv = $(this).attr("data-tennv");
        var makh = $(this).attr("data-makh");
        var tenkh = $(this).attr("data-tenkh");
        var tonghd = $(this).attr("data-tonghd");
        var ngaydat = $(this).attr("data-ngaydat");
        var ghichu = $(this).attr("data-ghichu");

        datasend = {
            madonhang : madh
        }

        console.log("chay xem chi tiettiet: " , datasend)
        queryDataPost("../php/data_get_chitiethoadon.php", datasend, function (res) {
            console.log("res chitiet:  ", res);
            if (res.success == 0) {
                bootbox.alert("Lỗi!");
            }

            var detailTableBody = document.getElementById('table_chitiet');
            $('#table_chitiet').html(`
                    <tr>
                    <th>#</th>
                    <th>Mã hoa</th>
                    <th>Tên Hoa</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                    </tr>
            
            `)
            if (res && res.length > 0) {
                i = 0;
                res.forEach(function (item) {
                    var row = document.createElement('tr');
                    i++;
                    row.innerHTML = `
                        <td>${i}</td>
                        <td>${item.MAHOA}</td>
                        <td>${item.TENHOA}</td>
                        <td>${item.SOLUONG}</td>
                        <td>${parseFloat(item.GIA).toLocaleString()} vnd</td>
                        
                        <!-- Thêm các cột khác tùy thuộc vào thông tin res -->
                    `;
                    detailTableBody.appendChild(row);
                });
            } else {
                var noDataRow = document.createElement('tr');
                noDataRow.innerHTML = '<td colspan="4">Không có dữ liệu</td>';
                detailTableBody.appendChild(noDataRow);
            }

            $('.madh_ct').html(`Mã đơn hàng: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${madh}`)
            $('.manv_ct').html(`Mã nhân viên: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${manv}`)
            $('.tennv_ct').html(`Tên nhân viên: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${tennv}`)
            $('.makh_ct').html(`Mã khách Hàng: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${makh}`)
            $('.tenkh_ct').html(`Tên khách hàng: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${tenkh}`)
            $('.ngaydat_ct').html(`Ngày đặt hàng: &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${ngaydat}`)
            $('.ghichu_ct').html(`Ghi chú đơn hàng: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;${ghichu}`)
            $('.tonghd_ct').html(`Tổng hóa đơn: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${parseFloat(tonghd).toLocaleString()} vnd`)

            $('.modal_xemchitiet').modal('show')
        })


    });
})
