

// Sử dụng hàm deleteCookie để xóa cookie
deleteCookie('cookieID');

// Hàm load dữ liệu khu nghỉ dưỡng
function Thich(makh, maknd) {
  return new Promise(function (resolve, reject) {
    // Dữ liệu chuẩn bị gửi lên server
    var datasend = {
      makh: makh,
      maknd: maknd
      // (cookieExists) ? cookieObject['id'] : ''
    };

    console.log(" datasend Thich(): ", datasend)

    queryDataPost("php/insert_thich.php", datasend, function (res) {
      console.log("res Thich: ", res)
      resolve(res);
    });
  });
}



var listLike = [];
// Hàm load dữ liệu khu nghỉ dưỡng
function LoadDataKhuNghiDuong() {
  return new Promise(function (resolve, reject) {
    var datasend = {
      makh: (cookieExists) ? cookieObject['id'] : ''
    };

    queryDataPost("php/load_data_khunghiduong.php", datasend, function (res) {
      console.log("response.data", res.data)
      resolve(res.data);
    });
  });
}

// Nút Loc chứa div select
$(document).ready(function () {
  $('#locBtn').click(function () {
    $('.my-div').toggleClass('show');
  });
});
$(document).ready(function () {
  $('#locBtn2').click(function () {
    $('.my-div').toggleClass('show');
  });
});


// Khai báo mảng các object item  
let list = document.getElementById('list')
let filter = document.querySelector('.filter')

LoadDataKhuNghiDuong().then(function (data) {
  if (data.thich === 1) {
    listLike = data.datathich;
  }
  console.log("listLike", listLike)
  let i = 0;

  console.log("data, ", data)
  data.dataknd.forEach(element => {
    //console.log("element : ", element)

    listProducts[i] = element;
    listProducts[i].dataCountry = element.MAQUOCGIA;
    listProducts[i].dataCategory = element.MALOAIHINH;
    i++;
  });
  productsFilter = listProducts;

  console.log("listProducts[0] :", listProducts[0])
  // hàm tạo và show các item
  showProduct(productsFilter, 6);

  console.log(data)
})
// .catch(function (error) {
//   console.error("Lỗi kiểm tra email:", error);
// });

let listProducts = []
// let listProducts = [
//   {
//     // Viet Nam 4
//     quocgia: 'Ninh Bình, Việt Nam',
//     ten: 'Analand Ninh Bình',
//     info: 'Tọa lạc trên vịnh Ninh Vân, resort Six Senses Ninh Van Bay mang đến không gian riêng tư và hòa mình vào thiên nhiên xanh mát.',
//     image: 'anh/sp-vn-1.jpg',
//     dataCountry: "Vie",
//     dataCategory: "villas",
//     link: 'item.html'
//   },
//   {
//     quocgia: 'Đà Nẵng, Việt Nam',
//     ten: 'Coliena DaNang',
//     info: 'Các căn phòng sang trọng, bãi biển tuyệt đẹp và hệ thống spa đẳng cấp sẽ làm cho kỳ nghỉ của bạn trở thành một trải nghiệm đáng nhớ.',
//     image: 'anhSp/vn-2.jpg',
//     dataCountry: "Vie",
//     dataCategory: "bien", link: 'item.html'
//   },
//   {
//     quocgia: 'Sapa, Việt Nam',
//     ten: 'Landla SaPa',
//     info: 'Nằm trên bán đảo Vinh Hy, resort Amanoi là một thiên đường nghỉ dưỡng giữa cảnh quan thiên nhiên hoang sơ. hi ha la sfd so',
//     image: 'anhSp/vn-1.jpg',
//     dataCountry: "Vie",
//     dataCategory: "nui", link: 'item.html'
//   },
//   {
//     quocgia: 'Đà Lạt, Việt Nam',
//     ten: 'Hung Vuong',
//     info: 'Với các biệt thự riêng tư, bể bơi vô cực hướng ra biển và trung tâm thể dục và spa cao cấp, Amanoi là lựa chọn tuyệt vời cho những ai muốn thư giãn',
//     image: 'anhSp/phi-3.jpg',
//     dataCountry: "Vie",
//     dataCategory: "villas", link: 'item.html'
//   },
//   {
//     //Thai lan 5
//     quocgia: 'Chiang Mai, Thái Lan',
//     ten: 'Lapping Kapu',
//     info: 'Tọa lạc trên vịnh Ninh Vân, resort Six Senses Ninh Van Bay mang đến không gian riêng tư và hòa mình vào thiên nhiên xanh mát.',
//     image: 'anhSp/thai-1.jpg',
//     dataCountry: "Thai",
//     dataCategory: "tp", link: 'item.html'
//   },
//   {
//     quocgia: 'Chiang Mai, Thái Lan',
//     ten: 'Resort Chiang Mai',
//     info: 'Nằm ở vùng núi Chiang Mai, resort này mang đến không gian yên bình và cảm giác gần gũi với thiên nhiên. ',
//     image: 'anhSp/thai-2.jpg',
//     dataCountry: "Thai",
//     dataCategory: "bien", link: 'item.html'
//   },
//   {
//     quocgia: 'Phuket, Thái Lan',
//     ten: 'Banyan Tree Phuket',
//     info: 'Tọa lạc tại hòn đảo Phuket, resort này nổi tiếng với không gian xanh mát và biển cát trắng. ',
//     image: 'anhSp/thai-3.jpg',
//     dataCountry: "Thai",
//     dataCategory: "dao"
//     , link: 'item.html'
//   },
//   {
//     quocgia: 'Krabi, Thái Lan',
//     ten: 'Rayavadee Krabi',
//     info: ' Được bao quanh bởi vịnh Krabi và rừng nhiệt đới, resort này mang đến một trải nghiệm tự nhiên độc đáo.',
//     image: 'anhSp/thai-4.jpg',
//     dataCountry: "Thai",
//     dataCategory: "lehoi", link: 'item.html'
//   },
//   {
//     quocgia: 'Pansea, Thái Lan',
//     ten: 'Amanpuri Phuket',
//     info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
//     image: 'anhSp/thai-5.jpg',
//     dataCountry: "Thai",
//     dataCategory: "villas", link: 'item.html'
//   },
//   {// Lào 3
//     quocgia: 'Chonaodo, Lào',
//     ten: 'Belmond La Résidence',
//     info: 'Nằm tại thành phố Luang Prabang, resort này mang đến không gian yên tĩnh và phong cách kiến trúc truyền thống Lào',
//     image: 'anhSp/lao-1.jpg',
//     dataCountry: "Lao",
//     dataCategory: "dao"
//     , link: 'item.html'
//   },
//   {
//     quocgia: 'Vientiane, Lào',
//     ten: 'Amantaka, Vientiane',
//     info: 'Amantaka mang đến sự kết hợp tinh tế giữa kiến trúc Pháp và văn hóa Lào truyền thống. trải nghiệm thư giãn và tận hưởng văn hóa độc đáo',
//     image: 'anhSp/lao-2.jpg',
//     dataCountry: "Lao",
//     dataCategory: "lehoi", link: 'item.html'
//   },
//   {
//     quocgia: 'Kamu, Lào',
//     ten: 'Kamulodge, Pakbeng',
//     info: 'Nằm ở vùng rừng núi Pakbeng, resort Kamu Lodge đưa bạn đến gần với thiên nhiên và cuộc sống của người dân bản địa.',
//     image: 'anhSp/lao-3.jpg',
//     dataCountry: "Lao",
//     dataCategory: "villas", link: 'item.html'
//   },
//   {// Cam 2
//     quocgia: 'Koh Rong, Campuchia',
//     ten: ' Island, Koh Rong',
//     info: 'Song Saa Private Island mang đến một trải nghiệm nghỉ dưỡng xa hoa giữa vẻ đẹp hoang sơ của biển Đông. ',
//     image: 'anhSp/cam-1.jpg',
//     dataCountry: "Cam",
//     dataCategory: "dao"
//     , link: 'item.html'
//   },
//   {
//     quocgia: 'Bokor, Campuchia',
//     ten: 'Bensley Collection, Sra',
//     info: 'Với các căn hộ hoang dã tiện nghi, trung tâm thể dục và spa độc đáo, cũng như các hoạt động như đi săn, thám hiểm rừng và điều khiển máy bay',
//     image: 'anhSp/cam-2.jpg',
//     dataCountry: "Cam",
//     dataCategory: "lehoi", link: 'item.html'
//   },
//   {// indo 3
//     quocgia: 'Borobudur, Indonexia',
//     ten: 'Amanjiwo, Borobudur',
//     info: 'Amanjiwo là một kỳ quan kiến trúc với kiến trúc độc đáo và phong cách kiến trúc Javanese. Với các villa riêng tư,...',
//     image: 'anhSp/ind-1.jpg',
//     dataCountry: "Ind",
//     dataCategory: "villas", link: 'item.html'
//   },
//   {
//     quocgia: 'Hanging, Indonexia',
//     ten: 'Gardens of Bali',
//     info: 'Được biết đến với hồ bơi vô cực nổi tiếng và tầm nhìn tuyệt đẹp ra thung lũng Ayung, Hanging Gardens of Bali là một điểm đến nghỉ dưỡng sang trọng',
//     image: 'anhSp/ind-2.jpg',
//     dataCountry: "Ind",
//     dataCategory: "lehoi", link: 'item.html'
//   },
//   {
//     quocgia: 'Bali, Indonexia',
//     ten: 'Ayana Resort',
//     info: 'Được tọa lạc tại bãi biển Jimbaran, Ayana Resort and Spa là một kỳ quan nghỉ dưỡng với khung cảnh biển tuyệt đẹp. ',
//     image: 'anhSp/ind-3.jpg',
//     dataCountry: "Ind",
//     dataCategory: "villas", link: 'item.html'
//   },
//   {// Mas 3
//     quocgia: 'Ubud, Malaisia',
//     ten: 'Four Seasons',
//     info: 'Nằm ở khu rừng núi Sayan của Ubud, Four Seasons Resort Bali at Sayan mang đến một trải nghiệm nghỉ dưỡng đẳng cấp.',
//     image: 'anhSp/mas-1.jpg',
//     dataCountry: "Mas",
//     dataCategory: "villas", link: 'item.html'
//   },
//   {
//     quocgia: 'Alila, Malaisia',
//     ten: 'Villas Uluwatu',
//     info: 'Resort nghỉ dưỡng sang trọng với các biệt thự riêng biệt và tầm nhìn ra biển tuyệt đẹp.',
//     image: 'anhSp/mas-2.jpg',
//     dataCountry: "Mas",
//     dataCategory: "lehoi", link: 'item.html'
//   },
//   {
//     quocgia: 'Borobudur, Malaisia',
//     ten: 'Amanjiwo, Borobudur',
//     info: 'resort này mang đến không gian yên bình và phục vụ tận tâm. trải nghiệm nghỉ dưỡng đẳng cấp',
//     image: 'anhSp/mas-3.jpg',
//     dataCountry: "Mas",
//     dataCategory: "villas", link: 'item.html'
//   },
//   {// sin 2
//     quocgia: 'Seminyak, Singapor',
//     ten: 'Bali, Seminyak',
//     info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
//     image: 'anhSp/sin-1.jpg',
//     dataCountry: "Sin",
//     dataCategory: "tp", link: 'item.html'
//   },
//   {
//     quocgia: 'Kuyere, Singapor',
//     ten: 'Rimba Jimbaran',
//     info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
//     image: 'anhSp/sin-2.jpg',
//     dataCountry: "Sin",
//     dataCategory: "tp", link: 'item.html'
//   },
//   {// Philippines 2
//     quocgia: 'Boracay, Philippines',
//     ten: 'Shangri-La Philippines',
//     info: 'Một kỳ quan nghỉ dưỡng tọa lạc trên bãi biển Boracay với cảnh quan thiên nhiên tuyệt đẹp và tiện nghi sang trọng.',
//     image: 'anhSp/phi-1.jpg',
//     dataCountry: "Phi",
//     dataCategory: "bien", link: 'item.html'
//   },
//   {
//     quocgia: 'Palawan, Philippines',
//     ten: 'El Nido Resorts',
//     info: 'Tọa lạc tại vịnh El Nido, Palawan, resort này cung cấp các biệt thự ven biển và hoạt động khám phá đáng nhớ trong vùng biển tuyệt đẹp.',
//     image: 'anhSp/phi-2.jpg',
//     dataCountry: "Phi",
//     dataCategory: "bien", link: 'item.html'
//   },
//   {
//     quocgia: 'Pamalican, Philippines',
//     ten: 'Pamalican Island',
//     info: 'Nằm trên hòn đảo riêng tư Pamalican, resort này mang đến không gian yên bình, bãi biển tuyệt đẹp và dịch vụ cao cấp.',
//     image: 'anhSp/phi-3.jpg',
//     dataCountry: "Phi",
//     dataCategory: "tp", link: 'item.html'
//   },
//   {// Myanmar 2
//     quocgia: 'Mactan, Myanmar',
//     ten: 'Crimson Resort',
//     info: 'Một resort nghỉ dưỡng tại hòn đảo Mactan, Cebu, với bãi biển riêng và các tiện ích nghỉ dưỡng đẳng cấp.',
//     image: 'anhSp/mya-1.jpg',
//     dataCountry: "Mya",
//     dataCategory: "lehoi", link: 'item.html'
//   },
//   {
//     quocgia: 'Batangas, Myanmar',
//     ten: 'Farm at San Benito',
//     info: 'Một khu nghỉ dưỡng thể thao và sức khỏe tọa lạc tại Batangas, với các tiện nghi chăm sóc sức khỏe và phong cách sống lành mạnh.',
//     image: 'anhSp/mya-2.jpg',
//     dataCountry: "Mya",
//     dataCategory: "trai", link: 'item.html'
//   },
// ]

let soDiv;
let soCong;
if (window.innerWidth < 767) {
  soDiv = soCong = 4; // Màn hình < 767px
} else if (window.innerWidth < 991) {
  soDiv = soCong = 4; // Màn hình < 991px
} else {
  soDiv = soCong = 6; // Màn hình >= 992px
}
console.log(soCong);
console.log(soDiv);

let notFoundDiv = document.querySelector('.notFound');
notFoundDiv.style.display = 'none';
let productsFilter = listProducts;
let endIndex = Math.min(soDiv, productsFilter.length);
let startIndex = 0;
let canLoadMore = true;

// hàm tạo và show các item
//showProduct(productsFilter, endIndex);

function showProduct(productsFilter, endIndex) {

  list.innerHTML = '';
  notFoundDiv.style.display = (productsFilter.length == 0) ? 'block' : 'none' // kiểm tra nếu độ dài sản phẩm lọc ...

  if (endIndex < productsFilter.length) {
    canLoadMore = true;
  }

  // dòng for tạo div item
  for (let i = 0; i < endIndex; i++) {

    let item = productsFilter[i];
    // tạo div
    let newItem = document.createElement('div');
    newItem.classList.add('card', 'col-lg-4', 'col-6', 'text-left', 'maunen');
    let classHeart = 'fa-regular fa-heart iconLike pt-1';

    listLike.forEach((e) => {
      if (e.MAKND === item.MAKND && item.MAKND) {
        classHeart = 'fa-heart iconLike pt-1 fa-solid';
      }
    })

    newItem.innerHTML = ` 
                            <a href="chitietkhunghiduong.php?idknd=${item.MAKND}"><img src="${item.ANHKND}">
                            <p>${item.DIACHIKND}</p>
                            <h3>${item.TENKND}</h3>
                            </a>
                            <div>${item.MOTAKND}</div>
                            <div class="d-flex justify-content-between">
                              <a href="chitietkhunghiduong.php?idknd=${item.MAKND}" class="xemThem">xem thêm</a>
                              <i class="${classHeart}" data-maknd="${item.MAKND}" ></i>
                            </div>
                            `
    list.appendChild(newItem);
  }

  let nutSanPham = document.getElementById('nutSanPham');

  if (endIndex < productsFilter.length && canLoadMore) { // sử lý nút xem thêm 
    console.log('if chay')
    // Hiển thị nút "Xem thêm"
    nutSanPham.style.display = 'block';

    // Gán sự kiện cho nút "Xem thêm"
    nutSanPham.addEventListener('click', function () {
      // Tăng chỉ số cuối cùng
      endIndex += soCong;

      // Kiểm tra nếu `endIndex` vượt quá giới hạn của mảng
      if (endIndex >= productsFilter.length) {
        endIndex = productsFilter.length; // Đặt `endIndex` bằng giới hạn của mảng
        canLoadMore = false; // Vô hiệu hóa biến kiểm tra
        nutSanPham.style.display = 'none'; // Ẩn nút "Xem thêm"
      }
      // Hiển thị thêm mục
      showProduct(productsFilter, endIndex);
    });
  } else {
    // Nếu không còn các mục chưa hiển thị hoặc không thể tải thêm, ẩn nút "Xem thêm"
    nutSanPham.style.display = 'none';
  }

  // xử lý thích
  $('.iconLike').on('click', function (e) {
    let traitim = $(this); // lưu elemet trái tim để vào hàm phía dưới có thể dùng được

    if (checkCookie('id')) {
      Thich(cookieObject['id'], $(this).attr('data-maknd')).then(function (res) {

        if (res.status != 0) {
          traitim.toggleClass('fa-regular fa-solid');
        } else {
          console.log("thêm/xóa thất bại")
        }
      })


    } else {
      alert('Đăng nhập để thích!');
    }
  });
}

// hàm xử lý lọc
document.getElementById('locBtn2').addEventListener('click', function (event) {
  event.preventDefault();

  // lưu các giá trị từ multi select vào mảng
  var selectedCountries = Array.from(document.getElementById('countrySelect').selectedOptions).map(function (option) {
    return option.value;
  });
  var selectedCategory = Array.from(document.getElementById('categorySelect').selectedOptions).map(function (option) {
    return option.value;
  });

  // xử lý lọc
  productsFilter = listProducts.filter(item => {
    if (selectedCountries.length != 0) {
      if (!selectedCountries.includes(item.dataCountry)) {
        return false;
      }
    }

    if (selectedCategory.length != 0) {
      if (!selectedCategory.includes(item.dataCategory)) {
        return false;
      }
    }
    return true;
  });

  endIndex = Math.min(soDiv, productsFilter.length); // Cập nhật giá trị của endIndex
  showProduct(productsFilter, endIndex);

});
// xử lý lọc khi vừa load web Giống hàm phía trên
document.addEventListener('DOMContentLoaded', function () {
  // Thực thi mã khi trang web được tải

  // lưu các giá trị từ multi select vào mảng
  var selectedCountries = Array.from(document.getElementById('countrySelect').selectedOptions).map(function (option) {
    return option.value;
  });
  var selectedCategory = Array.from(document.getElementById('categorySelect').selectedOptions).map(function (option) {
    return option.value;
  });

  // xử lý lọc
  productsFilter = listProducts.filter(item => {
    if (selectedCountries.length != 0) {
      if (!selectedCountries.includes(item.dataCountry)) {
        return false;
      }
    }
    if (selectedCategory.length != 0) {
      if (!selectedCategory.includes(item.dataCategory)) {
        return false;
      }
    }
    return true;
  });

  endIndex = Math.min(soDiv, productsFilter.length); // Cập nhật giá trị của endIndex
  showProduct(productsFilter, endIndex);

});
