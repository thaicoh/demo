let userName = document.querySelector('#userName');
let email = document.querySelector('#email');
let password = document.querySelector('#password');
let re_password = document.querySelector('#re_password');
let form = document.querySelector('.form');



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
function checkNull(listInput){
    let isNULL = false;
    listInput.forEach(input => {
        input.value = input.value.trim();
        if(!input.value){
            isNULL= true;
            showError(input, 'Không được để trống mục này!')
        }else{
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
      isEmailError =  true; // Email không hợp lệ
    }
    return isEmailError;
  }
// kiem tra doo dai 
function checkLength(input, min, max){
    input.value = input.value.trim();

    if(input.value.length < min ){
        showError(input, `Phải có ít nhất ${min} kí tự!`);
        return true;
    }
    if(input.value.length > max ){
        showError(input, `Không vượt quá ${max} kí tự!`);
        return true;
    }
    showSuccess(input);
}
// kiem tra mat khau trung nhau
function checkMatchPasswork(input,re_input){
    if(input.value !== re_input.value){
        showError(re_input,"Mật khẩu không khớp!");
        return true;
    }
    return false;
}

form.addEventListener('submit',function(e){
    e.preventDefault();
    let isNULL = checkNull([userName, email,password,re_password]);
    let isEmailError = checkEmail(email);
    let isUserNameLengthError = checkLength(userName,2,30);
    let isPasswordLengthError = checkLength(password,8,25);
    let isRe_passwordLengthError = checkLength(re_password,8,25);
    let isPasswordError = checkMatchPasswork(password,re_password);
     if(isNULL || isUserNameLengthError || isEmailError || isPasswordLengthError || isRe_passwordLengthError || isPasswordError){
        //sai
     }else{
        //thanh cong
        alert('Bạn đã đăng ký thành công!');
        localStorage.setItem('userName', userName.value);
        localStorage.setItem('password', password.value);
        window.location.href = "dangnhap.html";
     }
})

// 
let userName_dn = document.querySelector('#userName_dn');
let password_dn = document.querySelector('#password_dn');
let form_dn = document.querySelector('.form_dn');

let savedUserName = '';
let savedPassword = '';

 savedUserName = localStorage.getItem('userName');
 savedPassword = localStorage.getItem('password');
// dangnhap 
function dangnhap(userName, password, savedUserName, savedPassword) {
        if (userName.value.trim() !== savedUserName) {
            console.log(userName.value);
            console.log(savedUserName);
          showError(userName, 'Tên người dùng không tồn tại!');
          return false;
        } else {
          if (password.value.trim() !== savedPassword) {
            showError(password, 'Sai mật khẩu!');
            console.log(password.value);
            console.log(savedPassword);
            return false;
          } else {
            return true;
          }
        }
}

form_dn.addEventListener('submit',function(e){
    e.preventDefault();
    alert('hi')
    let isNULL = checkNull([userName_dn, password_dn]);
    if(isNULL){
        
    } else {
        if(dangnhap(userName_dn,password_dn,savedUserName,savedPassword)){
            alert('Đăng nhập thành công!');
            window.location.href = "index.html";
        }
    }
})







let form_lienHe = document.querySelector('#form_lienHe');
let ten = document.querySelector('#ten');
let mail = document.querySelector('#email');
let chude = document.querySelector('#chude');
let mess = document.querySelector('#mess');

form_lienHe.addEventListener('submit',function(e){
    e.preventDefault();
    let isNULL = checkNull([ten,mail,chude,mess]);
    let isEmailError = checkEmail(mail);

    if(isNULL||isEmailError){   
    } else {
            alert(`Cảm ơn ${ten.value.trim()} ,Chúng tôi đã nhận tin nhắn của bạn!`);
    }
})


