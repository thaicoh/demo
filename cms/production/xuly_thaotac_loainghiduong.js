function resetBtn() { // reset các ô input
    document.getElementById("uploadInput").style.display = "inline";
    document.getElementById("chooseAgainButton").style.display = "none";
    $('.btnThem').prop('disabled', false);
    $('.btnThem').addClass('.disabled_btn')
    $('.btnThem').prop('disabled', false);
    $('.btnThem').addClass('.disabled_btn')
    $('#malh').val('')
    $('#malh').focus()
    $('#tenlh').val('')
    $('#des').val('')
    $('#title').val('');
    $('#anhloaihinh').val('');
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
        console.log("chay")
        $('.btnThem').addClass('.disabled_btn')
        $('#malh').val('')
        $('#malh').focus()
        $('#tenlh').val('')
        $('#des').val('')
        $('#title').val('');
        $('#anhloaihinh').val('');
        $('.btnLuu').prop('disabled', false);
        trangThai = 1;
    });

    $('.btnTaoLai').click(function (e) {
        document.getElementById("uploadInput").style.display = "inline";
        document.getElementById("chooseAgainButton").style.display = "none";

        $('.btnThem').prop('disabled', false);
        $('.btnThem').addClass('.disabled_btn')
        $('#malh').val('')
        $('#malh').focus()
        $('#tenlh').val('')
        $('#des').val('')
        $('#title').val('');
        $('#anhloaihinh').val('');
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
                malh: $("#malh").val(),
                tenlh: $("#tenlh").val(),
                mota: $("#des").val(),
                titleloaihinh: $("#title").val()
                // Không gửi dữ liệu của ô input type file ở đây
            };

            for (var key in data) {
                formData.append(key, data[key]);
            } fetch('../php/LoaiNghiDuong/insert_ncc.php', {
                method: 'POST',
                body: formData // Đặt dữ liệu vào body của options
            })
                .then(response => response.json()) // Chuyển đổi phản hồi sang JSON
                .then(data => {
                    console.log(data); // In ra dữ liệu JSON từ PHP

                    if (data.success == 1) {
                        bootbox.alert("Thêm thành công!");
                        loadLoaiHoa(0, record);
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
            // Kiểm tra giá trị của input file
            var fileName = $("#uploadInput").val();
            var previewSrc = $("#previewImage").attr("src");

            console.log("fileName", fileName)
            console.log("previewSrc", previewSrc)
            if (!fileName && previewSrc) { // Người dùng không thay đổi hình ảnh

                console.log("chua chon file, va co hinh anh hien thi src = ", $("#previewImage").attr("src").replace(/^(\.\.\/)+/, ''));
                var datasend = {
                    malh: $("#malh").val(),
                    tenlh: $("#tenlh").val(),
                    mota: $("#des").val(),
                    titleloaihinh: $("#title").val(),
                    anhloaihinh: $("#previewImage").attr("src").replace(/^(\.\.\/)+/, '')
                }


            } else if (!previewSrc) {  // Người dùng xóa hình ảnh mặc định
                var datasend = {
                    malh: $("#malh").val(),
                    tenlh: $("#tenlh").val(),
                    mota: $("#des").val(),

                    titleloaihinh: $("#title").val(),

                    anhloaihinh: ""
                }
            }
            console.log(datasend);
            queryDataPost("../php/LoaiNghiDuong/update_ncc.php", datasend, function (res) {
                console.log(res);
                if (res.success == 1) {
                    /// alert("Thêm thành công");
                    bootbox.alert('Update dữ liệu vào thành công!');
                    loadLoaiHoa(0, record);
                    resetBtn();
                } else {
                    bootbox.alert('Update dữ liệu vào thất bại!');
                    console.log("lỗi : ", res.error)
                }
            })

            var formData = new FormData(document.getElementById('demo-form2'));
            fetch('../php/LoaiNghiDuong/upload_anhknd.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json()) // Chuyển đổi phản hồi sang JSON
                .then(data => {
                    console.log(data)
                    var datasend = {
                        malh: $("#malh").val(),
                        tenlh: $("#tenlh").val(),
                        mota: $("#des").val(),
                        titleloaihinh: $("#title").val(),

                        anhloaihinh: data.img
                    }

                    // Xử lý dữ liệu nhận được từ PHP
                    if (data.status == 1) {
                        //dữ liệu chuẩn gửi lên server dạng đối tượng
                        console.log(datasend);
                        queryDataPost("../php/LoaiNghiDuong/update_ncc.php", datasend, function (res) {
                            console.log("chayyyyy")
                            console.log(res);
                            if (res.success == 1) {
                                /// alert("Thêm thành công");
                                bootbox.alert('Update dữ liệu vào thành công!');
                                loadLoaiHoa(0, record);
                                resetBtn();
                            } else if (res.success == 0 && data.status == 1) {

                                loadLoaiHoa(0, record);
                                bootbox.alert('Update dữ liệu vào thành công!');
                                resetBtn();
                                loadLoaiHoa(0, record);
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

    $('.load_LoaiHoa').on('click', '.btn-xoa', function () {
        var malh = $(this).attr("data-malh");
        console.log(malh)
        bootbox.confirm('Bạn có chắc muốn xóa?', function (result) {
            if (result == true) {
                var datasend = {
                    malh: malh
                }
                queryDataPost("../php/LoaiNghiDuong/delete_ncc.php", datasend, function (res) {
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
        var previewImage = document.getElementById("previewImage");
        $('.btnLuu').prop('disabled', false);
        $('.btnSua').prop('disabled', true);
        $('.btnXoa').prop('disabled', false);
        $('.btnThem').prop('disabled', true);

        var malh = $(this).attr("data-malh");
        var tenlh = $(this).attr("data-tenlh");
        var mota = $(this).attr("data-mota");
        var title = $(this).attr("data-title");


        $('#malh').val(malh)
        $('#tenlh').val(tenlh)
        $('#des').val(mota)
        $('#title').val(title)

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
