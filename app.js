// slick slider js
$(document).ready(function(){
    $('.diaDiemNoiBat').slick({
        infinite: false,
        slidesToShow: 2.3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: false,
        dots: true,
      });
    });
$(document).ready(function(){
    $('.diemDenNoiBat').slick({
        infinite: false,
        slidesToShow: 2.3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: false,
        dots: true,
      });
    });



// Xem thêm và ẩn bớt quocgia
$(document).ready(function() {
  var showMore = 0;
  function toggleProducts() {
    if(showMore==0) {
      $('.quocgia.hidden2').hide();
      $('.quocgia.hidden').hide();
      $('#toggleBtn').text('Xem thêm');
    }
     else if (showMore==1) {
      $('.quocgia.hidden2').hide();
      $('.quocgia.hidden').hide();
      $('#toggleBtn').text('Xem thêm');
      var targetElement = document.getElementById("quocgiaList");
      targetElement.scrollIntoView();
    } else if (showMore==2) {
      $('.quocgia.hidden').show();
      $('#toggleBtn').text('Xem thêm');
    }
    else
    {
      $('.quocgia.hidden2').show();
      $('#toggleBtn').text('Ẩn bớt');
    }
    if(showMore==1||showMore==0){
      showMore=2;
    } else if(showMore==2){
      showMore++;
    } else {
      showMore=1;
    }
  }
  
  toggleProducts();
  
  $('#toggleBtn').click(function() {
    toggleProducts();
  });
});

// xem anh slick slider


// Item xử lý xem ảnh

document.addEventListener("DOMContentLoaded", function() {
  var imageList = document.querySelector(".image-list");
  var fullImageContainer = document.querySelector(".full-image-container");
  var fullImage = document.querySelector(".full-image");
  var prevButton = document.querySelector(".prev-button");
  var nextButton = document.querySelector(".next-button");
  var images = Array.from(imageList.getElementsByTagName("img"));
  var currentIndex = 0;

  // Hiển thị ảnh phóng to
  function showFullImage(index) {
    currentIndex = index;
    var imageUrl = images[currentIndex].src;
    fullImage.src = imageUrl;
    fullImageContainer.classList.add("show");
  }

  // Đóng ảnh phóng to
  function closeFullImage() {
    fullImageContainer.classList.remove("show");
  }

  // Xử lý sự kiện click trên danh sách ảnh
  imageList.addEventListener("click", function(event) {
    var clickedImage = event.target;
    if (clickedImage.tagName === "IMG") {
      var index = images.indexOf(clickedImage);
      showFullImage(index);
    }
  });

  // Xử lý sự kiện click nút prev
  prevButton.addEventListener("click", function() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showFullImage(currentIndex);
  });

  // Xử lý sự kiện click nút next
  nextButton.addEventListener("click", function() {
    currentIndex = (currentIndex + 1) % images.length;
    showFullImage(currentIndex);
  });

  // Xử lý sự kiện click để đóng ảnh phóng to
  fullImageContainer.addEventListener("click", function(event) {
    if (event.target === fullImageContainer) {
      closeFullImage();
    }
  });

  // Xử lý sự kiện phím bấm
  document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
      closeFullImage();
    } else if (event.key === "ArrowLeft") {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      showFullImage(currentIndex);
    } else if (event.key === "ArrowRight") {
      currentIndex = (currentIndex + 1) % images.length;
      showFullImage(currentIndex);
    }
  });
  var closeButton = document.querySelector(".close-button");

  // Xử lý sự kiện click nút đóng (close button)
  closeButton.addEventListener("click", function() {
    closeFullImage();
});

});
