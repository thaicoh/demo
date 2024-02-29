// Hàm kiểm tra trạng thái đăng nhập và thực hiện các thay đổi
function checkLoginStatus() {
  var isLoggedIn = localStorage.getItem('isLoggedIn');

  if (isLoggedIn === 'true') {
    // Nếu đã đăng nhập, thêm class 'hidden' vào '.nav-btn' và loại bỏ class 'hidden' khỏi '.nav-avt'
    $('.nav-btn').addClass('hidden');
    $('.nav-avt').removeClass('hidden');
  }
}

// Gọi hàm checkLoginStatus khi trang web được tải
$(document).ready(function () {
  checkLoginStatus();
});

// dropdown avt
$(document).ready(function () {
  $('.avtUser').click(function () {
    $(this).find('.dropdown-menu').slideToggle('fast');
  });
});

// dropdown so luong khach
$(document).ready(function () {
  // Xử lý sự kiện click vào phần tử có class "soluongkhach"
  $('.soluongkhach').click(function (event) {
    // Ngăn chặn sự kiện click từ lan truyền lên phần tử cha
    event.stopPropagation();

    // Hiển thị hoặc ẩn dropdown menu
    $(this).find('.menu-soluongkhach').slideToggle('fast');
  });

  // Ẩn dropdown menu khi click ra ngoài
  $(document).click(function () {
    $('.menu-soluongkhach').slideUp('fast');
  });

  // Ẩn dropdown menu khi click ok
  $('.btn-ok').click(function () {
    $('.menu-soluongkhach-menu').slideUp('fast');
  });
  // Ẩn dropdown menu khi click huy
  $('.btn-huy').click(function () {
    $('.menu-soluongkhach').slideUp('fast');
  });

  // Ngăn chặn sự kiện click từ việc ẩn dropdown menu
  $('.menu-soluongkhach').click(function (event) {
    event.stopPropagation();
  });
});

// logout
$(document).ready(function () {
  // Xử lý sự kiện click vào phần tử .logout
  $('.logout').click(function (event) {
    event.preventDefault();

    if (confirm("Bạn có chắc chắn muốn đăng xuất không?")) {
      localStorage.setItem('isLoggedIn', 'false');
      location.reload();
    }
  });
});



// nav
window.addEventListener('DOMContentLoaded', function () {
  var bodyWidth = document.body.offsetWidth;
  if (bodyWidth > 992) {
    var navbar = document.querySelector('.navbar');
    var scrollPosition = window.scrollY;

    if (scrollPosition === 0) {
      navbar.classList.add('large');
    } else {
      navbar.classList.remove('large');
    }
  }
});

window.addEventListener('scroll', function () {
  var bodyWidth = document.body.offsetWidth;
  if (bodyWidth > 992) {
    var navbar = document.querySelector('.navbar');
    var scrollPosition = window.scrollY;

    if (scrollPosition === 0) {
      navbar.classList.add('large');
    } else {
      navbar.classList.remove('large');
    }
  }
});

let nut = document.getElementById('toggler');
let div = document.getElementById('divMenu');
let nut2 = document.getElementById('toggler2');

nut.addEventListener('click', function (e) {
  e.preventDefault();
  div.classList.toggle('show2');
});
nut2.addEventListener('click', function (e) {
  e.preventDefault();
  div.classList.toggle('show2');
});


// Xem thêm và ẩn bớt quocgia
var items = document.querySelectorAll('.quocgia');
let btn = document.getElementById('toggleBtn');

let endIdex;
let cong;
if (window.innerWidth < 767) {
  endIdex = cong = 2; // Màn hình < 767px
} else if (window.innerWidth < 991) {
  endIdex = cong = 2; // Màn hình < 991px
} else {
  endIdex = cong = 3; // Màn hình >= 992px
}

function show(items, endIdex) {
  if (endIdex < items.length) {
    for (i = 0; i < endIdex; i++) {
      items[i].style.display = 'block';
    }
  } else {
    for (i = 0; i < items.length; i++) {
      items[i].style.display = 'block';
    }
  }

  if (endIdex < items.length) {
    btn.style.display = 'block';
  } else {
    btn.style.display = 'none';
  }
}
show(items, endIdex);
document.getElementById('toggleBtn').addEventListener('click', function (e) {
  e.preventDefault();
  endIdex += cong;
  show(items, endIdex);
});


// backToTop
window.addEventListener('scroll', function () {
  var backTopButton = document.querySelector('.backTop');
  if (window.pageYOffset > 200) {
    backTopButton.classList.add('show');
  } else {
    backTopButton.classList.remove('show');
  }
});

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
}
