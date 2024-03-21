let hoten = document.querySelector('.hoten');
let btn_capnhat = document.querySelector('.btn-capnhat');


function loadkhachhang(gmail, pass) {
    return new Promise(function (resolve, reject) {
        // Dữ liệu chuẩn bị gửi lên server
        var datasend = {
            gmail: gmail,
            pass: pass
        };

        // Gửi yêu cầu AJAX đến máy chủ
        queryDataPost("php/loaddata_khachhang.php", datasend, function (res) {
            // Kết quả trả về từ máy chủ
            resolve(res.exists); // Giải quyết Promise với kết quả từ máy chủ
        });
    });
}




$('.btn-capnhat').addEventListener('click', function (e) {
    e.preventDefault();
    console.log("chay")
})
