
// Nút Loc chứa div select
$(document).ready(function() {
    $('#locBtn').click(function() {
      $('.my-div').toggleClass('show');
    });
  });
  $(document).ready(function() {
    $('#locBtn2').click(function() {
      $('.my-div').toggleClass('show');
    });
  });

// Khai báo mảng các object item  
let list = document.getElementById('list')
let filter = document.querySelector('.filter')
let listProducts = [
{
  // Viet Nam 4
  quocgia: 'Ninh Bình, Việt Nam',
  ten: 'HAHAHA',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Vie",
  dataCategory:"villas",
  link: 'item.html'
},
{
  quocgia: 'Đà Nẵng, Việt Nam',
  ten: 'HIHIHI DaNang',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/vn-2.jpg',
  dataCountry : "Vie",
  dataCategory:"bien",link: 'item.html'
},
{
  quocgia: 'Sapa, Việt Nam',
  ten: 'HOHOHO SaPa',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/vn-1.jpg',
  dataCountry : "Vie",
  dataCategory:"nui",link: 'item.html'
},
{
  quocgia: 'Đà Lạt, Việt Nam',
  ten: 'hYadfgfdg LFAs',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/phi-3.jpg',
  dataCountry : "Vie",
  dataCategory:"villas",link: 'item.html'
},
{
  //Thai lan 5
  quocgia: 'KUKU, Thái Lan',
  ten: 'LAP XUONG NGON',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/thai-1.jpg',
  dataCountry : "Thai",
  dataCategory:"tp",link: 'item.html'
},
{
  quocgia: 'Ninh Com, Thái Lan',
  ten: 'KIKIKIKI THAi',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/thai-2.jpg',
  dataCountry : "Thai",
  dataCategory:"bien",link: 'item.html'
},
{
  quocgia: 'Thái Lan',
  ten: 'CUP HI THAI',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/thai-3.jpg',
  dataCountry : "Thai",
  dataCategory:"dao"
  ,link: 'item.html'
},
{
  quocgia: 'Thái Lan',
  ten: 'KIKIKIKI THAi',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/thai-4.jpg',
  dataCountry : "Thai",
  dataCategory:"lehoi",link: 'item.html'
},
{
  quocgia: 'Thái Lan',
  ten: 'KIKIKIKI THAi',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/thai-5.jpg',
  dataCountry : "Thai",
  dataCategory:"villas",link: 'item.html'
},
{// Lào 3
  quocgia: 'chonaodo, Lào',
  ten: 'CUP HI <AO>',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/lao-1.jpg',
  dataCountry : "Lao",
  dataCategory:"dao"
  ,link: 'item.html'
},
{
  quocgia: 'chonaodo, Lào',
  ten: 'KIKIKIKI LAO',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/lao-2.jpg',
  dataCountry : "Lao",
  dataCategory:"lehoi",link: 'item.html'
},
{
  quocgia: 'chonaodo, Lào',
  ten: 'KIKIKIKI LAO',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/lao-3.jpg',
  dataCountry : "Lao",
  dataCategory:"villas",link: 'item.html'
},
{// Cam 2
  quocgia: 'chonaodo, Campuchia',
  ten: 'CUP HI CAM',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/cam-1.jpg',
  dataCountry : "Cam",
  dataCategory:"dao"
  ,link: 'item.html'
},
{
  quocgia: 'chonaodo, Campuchia',
  ten: 'KII CAM',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/cam-2.jpg',
  dataCountry : "Cam",
  dataCategory:"lehoi",link: 'item.html'
},
{// indo 3
  quocgia: 'chonaodo, Indonexia',
  ten: 'KIKIKfI IND',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/ind-1.jpg',
  dataCountry : "Ind",
  dataCategory:"villas",link: 'item.html'
},
{
  quocgia: 'chonaodo, Indonexia',
  ten: 'KIKKI IND',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/ind-2.jpg',
  dataCountry : "Ind",
  dataCategory:"lehoi",link: 'item.html'
},
{
  quocgia: 'chonaodo, Indonexia',
  ten: 'KIKKI IND',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/ind-3.jpg',
  dataCountry : "Ind",
  dataCategory:"villas",link: 'item.html'
},
{// Mas 3
  quocgia: 'chonaodo, Malaisia',
  ten: 'KIKIKI MALAI',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/mas-1.jpg',
  dataCountry : "Mas",
  dataCategory:"villas",link: 'item.html'
},
{
  quocgia: 'chonaodo, Malaisia',
  ten: 'KIKIKI MALAI',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/mas-2.jpg',
  dataCountry : "Mas",
  dataCategory:"lehoi",link: 'item.html'
},
{
  quocgia: 'chonaodo, Malaisia',
  ten: 'KIKIKI MALAI',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/mas-3.jpg',
  dataCountry : "Mas",
  dataCategory:"villas",link: 'item.html'
},
{// sin 2
  quocgia: 'chonaodo, Singapor',
  ten: 'KIKIKI Sin',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/sin-1.jpg',
  dataCountry : "Sin",
  dataCategory:"tp",link: 'item.html'
},
{
  quocgia: 'chonaodo, Singapor',
  ten: 'KIKIKI Sin',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/sin-2.jpg',
  dataCountry : "Sin",
  dataCategory:"tp",link: 'item.html'
},
{// Philippines 2
  quocgia: 'chonaodo, Philippines',
  ten: 'KIIKI Philippines',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/phi-1.jpg',
  dataCountry : "Phi",
  dataCategory:"bien",link: 'item.html'
},
{
  quocgia: 'chonaodo, Philippines',
  ten: 'Philippines',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/phi-2.jpg',
  dataCountry : "Phi",
  dataCategory:"bien",link: 'item.html'
},
{
  quocgia: 'chonaodo, Philippines',
  ten: 'Ho, Philippines',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/phi-3.jpg',
  dataCountry : "Phi",
  dataCategory:"tp",link: 'item.html'
},
{// Myanmar 2
  quocgia: 'chonaodo, Myanmar',
  ten: 'KIIKI Myanmar',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/mya-1.jpg',
  dataCountry : "Mya",
  dataCategory:"lehoi",link: 'item.html'
},
{
  quocgia: 'chonaodo, Myanmar',
  ten: 'Myanmar',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anhSp/mya-2.jpg',
  dataCountry : "Mya",
  dataCategory:"trai",link: 'item.html'
},



]

let notFoundDiv = document.querySelector('.notFound');
notFoundDiv.style.display = 'none'
let productsFilter = listProducts;
let endIndex = Math.min(3, productsFilter.length);
let startIndex = 0;
let canLoadMore = true;

// hàm tạo và show item
showProduct(productsFilter, endIndex);
function showProduct(productsFilter, endIndex) {
list.innerHTML = '';

if(productsFilter.length==0){
  notFoundDiv.style.display = 'block'
}else{
  notFoundDiv.style.display = 'none'
}

if(endIndex<productsFilter.length){
  canLoadMore=true;
}

// dòng for tạo div item
for (let i = 0; i < endIndex; i++) {
  let item = productsFilter[i];

  // tạo div
  let newItem = document.createElement('div');
  newItem.classList.add('card', 'col-lg-4', 'col-6', 'text-left', 'maunen');
  //thêm thẻ a
  let link = document.createElement('a');
  link.href = item.link;
  newItem.appendChild(link);
  // thêm anh
  let newimg = new Image();
  newimg.src = item.image;
  link.appendChild(newimg);
  // thêm quocgia
  let quocGia = document.createElement('p');
  quocGia.innerText = item.quocgia;
  link.appendChild(quocGia);
  // thêm ten
  let newName = document.createElement('h3');
  newName.innerText = item.ten;
  link.appendChild(newName);
  // thêm ìnfo
  let info = document.createElement('div');
  info.innerText = item.info;
  newItem.appendChild(info);
  // thêm nút xem thêm
  let linkMore = document.createElement('a');
  linkMore.href = item.link;
  linkMore.innerText = 'xem thêm';
  newItem.appendChild(linkMore);

  list.appendChild(newItem);
}

console.log(`dộ dài = ${productsFilter.length}`)
console.log(`endIndex =  ${endIndex}`)
console.log(`canload =  ${canLoadMore}`)

let nutSanPham = document.getElementById('nutSanPham');

if (endIndex < productsFilter.length && canLoadMore) { // sử lý nút xem thêm 
  console.log('if chay')
  // Hiển thị nút "Xem thêm"
  nutSanPham.style.display = 'block';

  // Gán sự kiện cho nút "Xem thêm"
  nutSanPham.addEventListener('click', function () {
    // Tăng chỉ số cuối cùng
    endIndex += 3;

    // Kiểm tra nếu `endIndex` vượt quá giới hạn của mảng
    if (endIndex >= productsFilter.length) {
      endIndex = productsFilter.length; // Đặt `endIndex` bằng giới hạn của mảng
      canLoadMore = false; // Vô hiệu hóa biến kiểm tra
      nutSanPham.style.display = 'none'; // Ẩn nút "Xem thêm"
    }
    // Hiển thị thêm 3 mục
    showProduct(productsFilter, endIndex);
  });
} else {
  // Nếu không còn các mục chưa hiển thị hoặc không thể tải thêm, ẩn nút "Xem thêm"
  nutSanPham.style.display = 'none';
}
}

// hàm xử lý lọc
document.getElementById('locBtn2').addEventListener('click', function(event) {
event.preventDefault();

// lưu các giá trị từ multi select vào mảng
var selectedCountries = Array.from(document.getElementById('countrySelect').selectedOptions).map(function(option) {
    return option.value;
  });
var selectedCategory = Array.from(document.getElementById('categorySelect').selectedOptions).map(function(option) {
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

endIndex = Math.min(3, productsFilter.length); // Cập nhật giá trị của endIndex
showProduct(productsFilter, endIndex);
});

// xử lý lọc khi vừa load web
document.addEventListener('DOMContentLoaded', function() {
  // Thực thi mã khi trang web được tải
  
  // lưu các giá trị từ multi select vào mảng
  var selectedCountries = Array.from(document.getElementById('countrySelect').selectedOptions).map(function(option) {
    return option.value;
  });
  var selectedCategory = Array.from(document.getElementById('categorySelect').selectedOptions).map(function(option) {
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

  endIndex = Math.min(3, productsFilter.length); // Cập nhật giá trị của endIndex
  showProduct(productsFilter, endIndex);
});