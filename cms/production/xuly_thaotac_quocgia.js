function resetBtn() { // reset các ô input
    document.getElementById("uploadInput").style.display = "inline";
    document.getElementById("chooseAgainButton").style.display = "none";
    $('.btnThem').prop('disabled', false);
    $('.btnThem').addClass('.disabled_btn')
    $('.btnThem').prop('disabled', false);
    $('.btnThem').addClass('.disabled_btn')
    $('#txtmahoa').focus()
    $('#txtmahoa').val('')
    $('#txttenhoa').val('')
    $('#anhquocgia').val('');
    $('.btnLuu').prop('disabled', true);
    trangThai = 0;
    // Đặt lại giá trị của trường input
    document.getElementById("uploadInput").value = "";
    // Đặt lại ảnh xem trước
    document.getElementById("previewImage").src = "";
}

$(document).ready(function () {
    document.getElementById('demo-form2').addEventListener('submit', function (event) {
        event.preventDefault(); // Ngăn chặn gửi biểu mẫu mặc định
        // Các thao tác xử lý khác ở đây
    });

    var trangThai = 0;

    $('.btnLuu').prop('disabled', true);
    $('.btnSua').prop('disabled', true);
    $('.btnXoa').prop('disabled', true);

    $('.btnThem').click(function (e) {
        $('.btnThem').prop('disabled', true);
        $('.btnThem').addClass('.disabled_btn')

        $('#txtmahoa').on('keydown paste', function (e) {
            e.preventDefault();
            return false;
        });

        $('#txttenhoa').focus()
        $('#txttenhoa').val('')
        $('#anhquocgia').val('');
        $('#des').val('')

        $('.btnLuu').prop('disabled', false);
        trangThai = 1;
        datasend = {}
        queryDataPost("../php/QG/data_get_maqg.php", datasend, function (data) {
            let makh = []
            console.log("data1: ", data)
            data.res.forEach(element => {
                makh.push(element.MAQUOCGIA)
            });
            console.log(makh)
            let a = false;
            for (i = 0; i < makh.length - 1; i = i + 1) {
                if (makh[i + 1] - makh[i] > 1) {
                    $('#txtmahoa').val(parseInt(makh[i]) + 1)
                    a = true;
                    break
                } else {
                    $('#txtmahoa').val(parseInt(makh[makh.length - 1]) + 1)
                }
            }

            // if(a){
            //     $('#malh').val( parseInt(makh[i])  + 1)
            // }


        })


    });

    $('.btnTaoLai').click(function (e) {
        document.getElementById("uploadInput").style.display = "inline";
        document.getElementById("chooseAgainButton").style.display = "none";
        $('.btnThem').prop('disabled', false);
        $('.btnThem').addClass('.disabled_btn')
        $('#txtmahoa').val('')
        $('#txtmahoa').focus()
        $('#txttenhoa').val('')
        $('#anhquocgia').val('');
        $('#des').val('')

        $('.btnLuu').prop('disabled', true);
        trangThai = 0;
        // Đặt lại giá trị của trường input
        document.getElementById("uploadInput").value = "";
        // Đặt lại ảnh xem trước
        document.getElementById("previewImage").src = "";
    });
    // khi nhan nut luu
    $(".btnLuu").click(function () {
        if (trangThai == 1) {
            // Lấy dữ liệu từ biểu mẫu
            var formData = new FormData(document.getElementById('demo-form2'));

            // Lấy dữ liệu từ các ô input bên ngoài biểu mẫu
            var data = {
                maquocgia: $("#txtmahoa").val(),
                tenquocgia: $("#txttenhoa").val(),
                gioithieuquocgia: $("#des").val()
                // Không gửi dữ liệu của ô input type file ở đây
            };

            for (var key in data) {
                formData.append(key, data[key]);
            } fetch('../php/QG/insert_hoa.php', {
                method: 'POST',
                body: formData // Đặt dữ liệu vào body của options
            })
                .then(response => response.json()) // Chuyển đổi phản hồi sang JSON
                .then(data => {
                    console.log(data); // In ra dữ liệu JSON từ PHP

                    if (data.success == 1) {
                        bootbox.alert("Thêm thành công!");
                        loadHoa(0, record);
                        resetBtn();
                    }
                    else if (data.success == 0) {
                        bootbox.alert("Không thể kết nối với server!");
                    }
                    else {
                        bootbox.alert("Trùng mã khách hàng!");
                    }
                })
                .catch(error => {
                    console.error('Error:', error); // Xử lý lỗi nếu có
                });
        } else if (trangThai == 2) {
            var fileName = $("#uploadInput").val();
            var previewSrc = $("#previewImage").attr("src");

            console.log("fileName", fileName)
            console.log("previewSrc", previewSrc)
            if (!fileName && previewSrc) { // Người dùng không thay đổi hình ảnh

                console.log("chua chon file, va co hinh anh hien thi src = ", $("#previewImage").attr("src").replace(/^(\.\.\/)+/, ''));
                var datasend = {
                    maQuocGia: $("#txtmahoa").val(),
                    tenQuocGia: $("#txttenhoa").val(),
                    gioiThieuQuocGia: $("#des").val(),
                    anhQuocGia: $("#previewImage").attr("src").replace(/^(\.\.\/)+/, '')
                }


            } else if (!previewSrc) {  // Người dùng xóa hình ảnh mặc định
                var datasend = {
                    maQuocGia: $("#txtmahoa").val(),
                    tenQuocGia: $("#txttenhoa").val(),
                    gioiThieuQuocGia: $("#des").val(),

                    anhQuocGia: ""
                }
            }
            //dữ liệu chuẩn gửi lên server dạng đối tượng
            console.log(datasend);
            queryDataPost("../php/QG/update_hoa.php", datasend, function (res) {
                console.log(res);
                if (res.success == 1) {
                    /// alert("Thêm thành công");
                    bootbox.alert('Update dữ liệu vào thành công!');
                    loadHoa(0, record);
                    resetBtn();
                } else {
                    bootbox.alert('Update dữ liệu vào thất bại!');
                    console.log("lỗi : ", res.error)
                }
            })

            var formData = new FormData(document.getElementById('demo-form2'));
            fetch('../php/QG/upload_anhknd.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json()) // Chuyển đổi phản hồi sang JSON
                .then(data => {
                    console.log(data)
                    var datasend = {
                        maQuocGia: $("#txtmahoa").val(),
                        tenQuocGia: $("#txttenhoa").val(),
                        gioiThieuQuocGia: $("#des").val(),
                        anhQuocGia: data.img
                    }

                    // Xử lý dữ liệu nhận được từ PHP
                    if (data.status == 1) {
                        //dữ liệu chuẩn gửi lên server dạng đối tượng
                        console.log(datasend);
                        queryDataPost("../php/QG/update_hoa.php", datasend, function (res) {
                            console.log("chayyyyy")
                            console.log("1: ", res);
                            if (res.success == 1) {
                                /// alert("Thêm thành công");
                                bootbox.alert('Update dữ liệu vào thành công!');
                                loadHoa(0, record);
                                resetBtn();
                            } else if (res.success == 0 && data.status == 1) {
                                bootbox.alert('Update dữ liệu vào thành công!');
                                resetBtn();
                                loadHoa(0, record);
                            } else {
                                bootbox.alert('Update dữ liệu vào thất bại!');
                                console.log("lỗi : ", res.error)
                            }
                        })

                    } else if (data.status == 0) {

                    }
                })
                .catch(error => {
                    console.error('Error:', error); // Xử lý lỗi nếu có
                });

        } else {
            console.log("chua chon thao tac ");
        }
    })
    $('.loadhoa').on('click', '.btn-xoa', function () {
        var malh = $(this).attr("data-mah");
        console.log(malh)
        bootbox.confirm('Bạn có chắc muốn xóa?', function (result) {
            if (result == true) {
                var datasend = {
                    malh: malh
                }
                queryDataPost("../php/QG/delete_hoa.php", datasend, function (res) {
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

        var previewImage = document.getElementById("previewImage");
        $('.btnLuu').prop('disabled', false);
        $('.btnSua').prop('disabled', true);
        $('.btnXoa').prop('disabled', false);
        $('.btnThem').prop('disabled', true);

        var tenh = $(this).attr("data-tenh");
        var mota = $(this).attr("data-mota");
        var mah = $(this).attr("data-mah");


        console.log(tenh)
        console.log(mota)
        console.log(mah)

        $('#txtmahoa').val(mah)
        $('#txttenhoa').val(tenh)
        $('#des').val(mota)

        if ($(this).attr("data-anh") != "") {
            // Lấy đối tượng hình ảnh từ DOM

            // Cập nhật đường dẫn của hình ảnh
            previewImage.src = "../" + $(this).attr("data-anh");

            document.getElementById("uploadInput").style.display = "none";
            document.getElementById("chooseAgainButton").style.display = "inline";
        } else {
            previewImage.src = '';
            document.getElementById("uploadInput").style.display = "inline";
            document.getElementById("chooseAgainButton").style.display = "none";
        }

        trangThai = 2;
    });

})
