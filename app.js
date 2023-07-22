// nav
window.addEventListener('DOMContentLoaded', function() {
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

window.addEventListener('scroll', function() {
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

  nut.addEventListener('click', function(e){
    e.preventDefault();
    div.classList.toggle('show2');
  });
  nut2.addEventListener('click', function(e){
    e.preventDefault();
    div.classList.toggle('show2');
  });


 





// slick slider js
// let so_o;
// if (window.innerWidth < 767) {
//   so_o  = 1.2; // Màn hình < 767px
// } else if (window.innerWidth < 991) {
//   so_o = 1.5; // Màn hình < 991px
// } else {
//   so_o  = 2.3; // Màn hình >= 992px
// }


// $(document).ready(function(){
//     $('.diaDiemNoiBat').slick({
//         infinite: false,
//         slidesToShow: so_o,
//         slidesToScroll: 1,
//         autoplay: false,
//         autoplaySpeed: 2000,
//         arrows: false,
//         dots: true,
//       });
//     });
// $(document).ready(function(){
//     $('.diemDenNoiBat').slick({
//         infinite: false,
//         slidesToShow: 2.3,
//         slidesToScroll: 1,
//         autoplay: false,
//         autoplaySpeed: 2000,
//         arrows: false,
//         dots: true,
//       });
//     });

  // Xem thêm và ẩn bớt quocgia
  var items = document.querySelectorAll('.quocgia');
  let btn = document.getElementById('toggleBtn');

  let endIdex;
  let cong;
  if (window.innerWidth < 767) {
    endIdex = cong = 2; // Màn hình < 767px
  } else if (window.innerWidth < 991) {
    endIdex  = cong = 2; // Màn hình < 991px
  } else {
    endIdex  = cong = 3; // Màn hình >= 992px
  }

  function show(items,endIdex){
    if(endIdex<items.length){
      for(i=0; i<endIdex; i++){
        items[i].style.display = 'block';
        }
    }else{
      for(i=0; i<items.length; i++){
        items[i].style.display = 'block';
        }
    }
    
      if(endIdex<items.length){
        btn.style.display='block';
      } else {
        btn.style.display='none';
      }
  }
    show(items,endIdex);
    document.getElementById('toggleBtn').addEventListener('click',function(e){
      e.preventDefault();
      endIdex+=cong;
      show(items, endIdex);     
    });


// backToTop
window.addEventListener('scroll', function() {
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
