let userName_dn = document.querySelector('#userName_dn');
let password_dn = document.querySelector('#password_dn');
let form_dn = document.querySelector('.form_dn');

let savedUserName = '';
let savedPassword = '';


// Hàm kiểm tra email đã tồn tại hay chưa
function KiemTraTaiKhoanTonTai(gmail) {
    return new Promise(function (resolve, reject) {
        // Dữ liệu chuẩn bị gửi lên server
        var datasend = {
            gmail: gmail
        };

        // Gửi yêu cầu AJAX đến máy chủ
        queryDataPost("php/dangki_kiemtratontai.php", datasend, function (res) {
            // Kết quả trả về từ máy chủ
            resolve(res.exists);
        });
    });
}


// Hàm kiểm tra đăng nhập
function DangNhap(gmail, pass) {
    return new Promise(function (resolve, reject) {
        var datasend = {
            gmail: gmail,
            pass: pass
        };

        queryDataPost("php/dangnhap.php", datasend, function (res) {

            console.log("res.status", res.status)
            console.log("res.mess", res.message)

            resolve(res.status); // Promise
        });
    })
}


savedUserName = localStorage.getItem('userName');
savedPassword = localStorage.getItem('password');

function showError(input, mess) {
    let parent = input.parentElement;
    let small = parent.querySelector('small');

    parent.classList.add('error');
    small.innerText = mess;
}
function showSuccess(input) {
    let parent = input.parentElement;
    let small = parent.querySelector('small');

    parent.classList.remove('error');
    small.innerText = ''
}
// kiem tra rong
function checkNull(listInput) {
    let isNULL = false;
    listInput.forEach(input => {
        input.value = input.value.trim();
        if (!input.value) {
            isNULL = true;
            showError(input, 'Không được để trống mục này!')
        } else {
            showSuccess(input)
        }
    });
    return isNULL;
}

// kiem tra email 
function checkEmail(input) {
    const regexE = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,})+$/;

    input.value = input.value.trim();
    let isEmailError = !regexE.test(input.value);
    if (regexE.test(input.value)) {
        showSuccess(input);
        isEmailError = false; // Email hợp lệ
    } else {
        showError(input, 'Email không hợp lệ!');
        isEmailError = true; // Email không hợp lệ
    }
    return isEmailError;
}


form_dn.addEventListener('submit', function (e) {
    e.preventDefault();
    console.log("ấn")
    let isNULL = checkNull([userName_dn, password_dn]);

    if (isNULL) {

    } else {
        // Kiểm tra email tồn tại
        KiemTraTaiKhoanTonTai(userName_dn.value)
            .then(function (exists) {
                if (exists) {
                    showSuccess(userName_dn);

                    DangNhap(userName_dn.value, password_dn.value).then(function (e) {
                        if (e == 0) {
                            showError(password_dn, "Sai mật khẩu!")
                        } else if (e == 1) {
                            showSuccess(password_dn);
                            console.log("chao user")
                            window.location.href = "index.php";
                            localStorage.setItem('isLoggedIn', 'true');
                        } else if (e == 2) {
                            showSuccess(password_dn);
                            console.log("chao admin")
                            window.location.href = "cms/production/index.php";
                            localStorage.setItem('isLoggedIn', 'true');
                        }
                    })

                } else {
                    showError(userName_dn, "Tài khoảng không tồn tại!")
                }
            })
            .catch(function (error) {
                console.error("Lỗi kiểm tra email:", error);
            });


    }
})