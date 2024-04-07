function resetBtn() { // reset các ô input
    document.getElementById("uploadInput").style.display = "inline";
    document.getElementById("chooseAgainButton").style.display = "none";
    $('.btnThem').prop('disabled', false);
    $('.btnThem').addClass('.disabled_btn')
    $('.btnThem').prop('disabled', false);
    $('.btnThem').addClass('.disabled_btn')

    $('#mar').val('')
    $('#mar').focus()
    $('#tenr').val('')
    $('#knd').val('')
    $('#slp').val('')
    $('#dientich').val('')
    $('#succhua').val('')
    $('#diachi').val('')
    $('#gtd').val('')
    $('#slg').val('')
    $('#lg').val('')
    $('#mtr').val('')

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

        $('#mar').on('keydown paste', function (e) {
            e.preventDefault();
            return false;
        });

        $('#tenr').focus()
        $('#tenr').val('')
        $('#knd').val('')
        $('#slp').val('')
        $('#dientich').val('')
        $('#succhua').val('')
        $('#diachi').val('')
        $('#gtd').val('')
        $('#slg').val('')
        $('#lg').val('')
        $('#mtr').val('')


        $('.btnLuu').prop('disabled', false);
        trangThai = 1;
        datasend = {}
        queryDataPost("../php/Resort/data_get_ma.php", datasend, function (data) {
            let makh = []
            console.log("data1: ", data)
            data.res.forEach(element => {
                makh.push(element.MARESORT)
            });
            console.log(makh)
            let a = false;
            for (i = 0; i < makh.length - 1; i = i + 1) {
                if (makh[i + 1] - makh[i] > 1) {
                    $('#mar').val(parseInt(makh[i]) + 1)
                    a = true;
                    break
                } else {
                    $('#mar').val(parseInt(makh[makh.length - 1]) + 1)
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

        $('#mar').val('')
        $('#mar').focus()
        $('#tenr').val('')
        $('#knd').val('')
        $('#slp').val('')
        $('#dientich').val('')
        $('#succhua').val('')
        $('#diachi').val('')
        $('#gtd').val('')
        $('#slg').val('')
        $('#lg').val('')
        $('#mtr').val('')

        $('.btnLuu').prop('disabled', true);
        trangThai = 0;
        // Đặt lại giá trị của trường input
        document.getElementById("uploadInput").value = "";
        // Đặt lại ảnh xem trước
        document.getElementById("previewImage").src = "";
    });



    // khi nhan nut luu
    $(".btnLuu").click(function () {

        var mar = $("#mar").val();
        var tenr = $("#tenr").val();
        var knd = $("#knd option:selected").val();
        var slp = $("#slp").val();
        var dientich = $("#dientich").val();
        var succhua = $("#succhua").val();
        var diachi = $("#diachi").val();
        var gtd = $("#gtd").val();
        var slg = $("#slg").val();
        var lg = $("#lg").val();
        var mtr = $("#mtr").val();

        var diaChiKND = $("#diachiknd").val();
        var maQuocGia = $("#qg option:selected").val(); // Lấy giá trị của option đã chọn
        var maLoaiHinh = $("#lh option:selected").val(); // Lấy giá trị của option đã chọn

        if (mar == '' || tenr == '' || knd == '' || dientich == '' || succhua == '' || slp == '' || diachi == '' || gtd == '' || slg == '' || lg == '' || mtr == ''  ) {
            bootbox.alert("Vui lòng điền đầy đủ thông tin!");
            return; // Dừng việc thực hiện tiếp nếu thiếu thông tin
        }

        if (trangThai == 1) {
            // Lấy dữ liệu từ biểu mẫu
            var formData = new FormData(document.getElementById('demo-form2'));

            // Lấy dữ liệu từ các ô input bên ngoài biểu mẫu
            var data = {
                mar: $("#mar").val(),
                tenr: $("#tenr").val(),
                knd: $("#knd option:selected").val(),
                slp: $("#slp").val(),
                dientich: $("#dientich").val(),
                succhua: $("#succhua").val(),
                diachi: $("#diachi").val(),
                gtd: $("#gtd").val(),
                slg: $("#slg").val(),
                lg: $("#lg").val(),
                mtr: $("#mtr").val(),
                // Không gửi dữ liệu của ô input type file ở đây
            };
            console.log("DATA: ", data)

            // Thêm dữ liệu vào biểu mẫu
            for (var key in data) {
                formData.append(key, data[key]);
            } fetch('../php/Resort/insert_hoa.php', {
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
            // Kiểm tra giá trị của input file
            var fileName = $("#uploadInput").val();
            var previewSrc = $("#previewImage").attr("src");

            console.log("fileName", fileName)
            console.log("previewSrc", previewSrc)
            if (!fileName && previewSrc) { // Người dùng không thay đổi hình ảnh

                console.log("chua chon file, va co hinh anh hien thi src = ", $("#previewImage").attr("src").replace(/^(\.\.\/)+/, ''));
                var datasend = {
                    mar: $("#mar").val(),
                    tenr: $("#tenr").val(),
                    knd: $("#knd option:selected").val(),
                    slp: $("#slp").val(),
                    dientich: $("#dientich").val(),
                    succhua: $("#succhua").val(),
                    diachi: $("#diachi").val(),
                    gtd: $("#gtd").val(),
                    slg: $("#slg").val(),
                    lg: $("#lg").val(),
                    mtr: $("#mtr").val(),
                    anh: $("#previewImage").attr("src").replace(/^(\.\.\/)+/, '')
                }


            } else if (!previewSrc) {  // Người dùng xóa hình ảnh mặc định
                var datasend = {
                    mar: $("#mar").val(),
                    tenr: $("#tenr").val(),
                    knd: $("#knd option:selected").val(),
                    slp: $("#slp").val(),
                    dientich: $("#dientich").val(),
                    succhua: $("#succhua").val(),
                    diachi: $("#diachi").val(),
                    gtd: $("#gtd").val(),
                    slg: $("#slg").val(),
                    lg: $("#lg").val(),
                    mtr: $("#mtr").val(),
                    anh: ""
                }
            }
            // gọi hàm update cho datasend ở 2 điều kiện trên
            console.log("datasend: ", datasend);
            queryDataPost("../php/Resort/update_hoa.php", datasend, function (res) {
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
            // Lấy dữ liệu từ biểu mẫu
            var formData = new FormData(document.getElementById('demo-form2'));

            // Gửi dữ liệu đến file PHP thứ nhất và nhận phản hồi
            fetch('../php/Resort/upload_anhknd.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json()) // Chuyển đổi phản hồi sang JSON
                .then(data => {
                    console.log(data)
                    var datasend = {
                        mar: $("#mar").val(),
                        tenr: $("#tenr").val(),
                        knd: $("#knd option:selected").val(),
                        slp: $("#slp").val(),
                        dientich: $("#dientich").val(),
                        succhua: $("#succhua").val(),
                        diachi: $("#diachi").val(),
                        gtd: $("#gtd").val(),
                        slg: $("#slg").val(),
                        lg: $("#lg").val(),
                        mtr: $("#mtr").val(),
                        anh: data.img
                    }

                    // Xử lý dữ liệu nhận được từ PHP
                    if (data.status == 1) {
                        //dữ liệu chuẩn gửi lên server dạng đối tượng
                        console.log(datasend);
                        queryDataPost("../php/Resort/update_hoa.php", datasend, function (res) {
                            console.log("chayyyyy")
                            console.log(res);
                            if (res.success == 1) {
                                /// alert("Thêm thành công");
                                bootbox.alert('Update dữ liệu vào thành công!');
                                loadHoa(0, record);
                                resetBtn();
                            } else if (res.success == 0 && data.status == 1) {

                                loadHoa(0, record);
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
        var maKND = $(this).attr("data-maknd");
        console.log(maKND)
        bootbox.confirm('Bạn có chắc muốn xóa?', function (result) {
            if (result == true) {
                var datasend = {
                    maknd: maKND.trim()
                }
                queryDataPost("../php/Resort/delete_hoa.php", datasend, function (res) {
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

        // console.log(maKND)
        // console.log(tenKND)
        // console.log(diaChiKND)
        // console.log(moTaKND)
        // console.log(maQuocGia)
        // console.log(maLoaiHinh)
        

        $('#mar').val($(this).attr("data-maresort"))
        $('#tenr').val($(this).attr("data-tenresort"))
        $('#knd').val($(this).attr("data-tenknd"))
        $('#slp').val($(this).attr("data-slp"))
        $('#dientich').val($(this).attr("data-dientich"))
        $('#succhua').val($(this).attr("data-slktd"))
        $('#diachi').val($(this).attr("data-diachi"))
        $('#gtd').val($(this).attr("data-gtd"))
        $('#slg').val($(this).attr("data-slg"))
        $('#lg').val($(this).attr("data-lg"))
        $('#mtr').val($(this).attr("data-mota"))

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
