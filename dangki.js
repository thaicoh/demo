let userName = document.querySelector('#userName');
let email = document.querySelector('#email');
let password = document.querySelector('#password');
let re_password = document.querySelector('#re_password');
let form = document.querySelector('.form');

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
            resolve(res.exists); // Giải quyết Promise với kết quả từ máy chủ
        });
    });
}

// Hàm thêm tài khoảng
function ThemTaiKhoang(gmail, name, pass) {
    return new Promise(function (resolve, reject) {
        var datasend = {
            gmail: gmail,
            name: name,
            pass: pass
        };

        // Gửi yêu cầu AJAX đến máy chủ
        queryDataPost("php/insert_user.php", datasend, function (res) {
            // Kết quả trả về từ máy chủ
            console.log("res.status", res.status)
            console.log("res.mess", res.message)

            resolve(res.status); // Giải quyết Promise với kết quả từ máy chủ
        });
    })
}

// Hàm kiểm tra đăng nhập
function DangNhap(gmail, pass) {
    return new Promise(function (resolve, reject) {
        var datasend = {
            gmail: gmail,
            pass: pass
        };

        // Gửi yêu cầu AJAX đến máy chủ
        queryDataPost("php/dangnhap.php", datasend, function (res) {
            // Kết quả trả về từ máy chủ
            console.log("res.status", res.status)
            console.log("res.mess", res.message)

            resolve(res.status); // Giải quyết Promise với kết quả từ máy chủ
        });
    })
}





// show lỗi
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
// kiem tra doo dai 
function checkLength(input, min, max) {
    input.value = input.value.trim();

    if (input.value.length < min) {
        showError(input, `Phải có ít nhất ${min} kí tự!`);
        return true;
    }
    if (input.value.length > max) {
        showError(input, `Không vượt quá ${max} kí tự!`);
        return true;
    }
    showSuccess(input);
}
// kiem tra mat khau trung nhau
function checkMatchPasswork(input, re_input) {
    if (input.value !== re_input.value) {
        showError(re_input, "Mật khẩu không khớp!");
        return true;
    }
    return false;
}


form.addEventListener('submit', function (e) {
    e.preventDefault();
    let isNULL = checkNull([userName, email, password, re_password]);
    let isEmailError = checkEmail(email);
    let isUserNameLengthError = checkLength(userName, 2, 30);
    let isPasswordLengthError = checkLength(password, 8, 25);
    let isRe_passwordLengthError = checkLength(re_password, 8, 25);
    let isPasswordError = checkMatchPasswork(password, re_password);



    if (isNULL || isUserNameLengthError || isEmailError || isPasswordLengthError || isRe_passwordLengthError || isPasswordError) {
        //sai
    } else {
        // Kiểm tra email tồn tại
        KiemTraTaiKhoanTonTai(email.value)
            .then(function (exists) {
                if (exists) {
                    showError(email, "Email này đã được sử dụng!");
                } else {
                    showSuccess(email);
                    ThemTaiKhoang(email.value, userName.value, password.value).then(function (e) {
                        console.log(e)
                    })
                    alert('Bạn đã đăng ký thành công!');
                    localStorage.setItem('userName', email.value);
                    localStorage.setItem('password', password.value);
                    window.location.href = "dangnhap.html";
                }
            })
            .catch(function (error) {
                console.error("Lỗi kiểm tra email:", error);
            });
    }
})



// lien he
let form_lienHe = document.querySelector('#form_lienHe');
let ten = document.querySelector('#ten');
let mail = document.querySelector('#email');
let chude = document.querySelector('#chude');
let mess = document.querySelector('#mess');

form_lienHe.addEventListener('submit', function (e) {
    e.preventDefault();
    let isNULL = checkNull([ten, mail, chude, mess]);
    let isEmailError = checkEmail(mail);

    if (isNULL || isEmailError) {
    } else {
        alert(`Cảm ơn ${ten.value.trim()} ,Chúng tôi đã nhận tin nhắn của bạn!`);
    }
})



