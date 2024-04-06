

$(".btncapnhat").click(function (e) {
    e.preventDefault();
    
    // // Kiểm tra giá trị của input file
    // var fileName = $("#uploadInput").val();
    // var previewSrc = $("#previewImage").attr("src");

    // console.log("fileName", fileName)
    // console.log("previewSrc", previewSrc)
    // if (!fileName && previewSrc) { // Người dùng không thay đổi hình ảnh

    //     console.log("chua chon file, va co hinh anh hien thi src = ", $("#previewImage").attr("src").replace(/^(\.\.\/)+/, ''));
    //     var datasend = {
    //         maKH: $("#malh").val(),
    //         tenKH: $("#tenlh").val(),
    //         emailKH: $("#emailkh").val(),
    //         sdtKH: $("#sdtkh").val(),
    //         gioiTinh: $("#gt").val(),
    //         matKhauKH: $("#mk").val(),
    //         anhKH: $("#previewImage").attr("src").replace(/^(\.\.\/)+/, '')
    //     }


    // } else if (!previewSrc) {  // Người dùng xóa hình ảnh mặc định
    //     var datasend = {
    //         maKH: $("#malh").val(),
    //         tenKH: $("#tenlh").val(),
    //         emailKH: $("#emailkh").val(),
    //         sdtKH: $("#sdtkh").val(),
    //         gioiTinh: $("#gt").val(),
    //         matKhauKH: $("#mk").val(),
    //         anhKH: ""
    //     }
    // }
    // // gọi hàm update cho datasend ở 2 điều kiện trên
    // console.log("datasend: ", datasend);
    // queryDataPost("../php/update_khachhang.php", datasend, function (res) {
    //     if (res.success == 1) {
    //         /// alert("Thêm thành công");
    //         bootbox.alert('Update dữ liệu vào thành công!');
    //         loadLoaiHoa(0, record);
    //         resetBtn();
    //     } else {
    //         bootbox.alert('Update dữ liệu vào thất bại!');
    //         console.log("lỗi : ", res.error)
    //     }
    // })



    // Lấy dữ liệu từ biểu mẫu
    var formData = new FormData(document.getElementById('demo-form2'));

    var makh = cookieObject['id'];
    console.log("makh", makh)

    formData.append('malh', makh);
    console.log("formData: ", formData)
    // Gửi dữ liệu đến file PHP thứ nhất và nhận phản hồi
    fetch('php/upload_anhkhachhang.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json()) // Chuyển đổi phản hồi sang JSON
        .then(data => {
            console.log("data: ", data)
            var datasend = {
                maKH: $("#malh").val(),
                tenKH: $("#tenlh").val(),
                emailKH: $("#emailkh").val(),
                sdtKH: $("#sdtkh").val(),
                gioiTinh: $("#gt").val(),
                matKhauKH: $("#mk").val(),
                anhKH: data.img
            }

            // Xử lý dữ liệu nhận được từ PHP
            if (data.status == 1) {
                //dữ liệu chuẩn gửi lên server dạng đối tượng
                console.log(datasend);
                queryDataPost("../php/update_khachhang.php", datasend, function (res) {
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

})

