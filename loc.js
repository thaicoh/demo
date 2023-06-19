
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
  id:1,
  quocgia: 'Ninh Bình, Việt Nam',
  ten: 'HAHAHA',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Vie",
  dataCategory:"nui",link: 'item.html'
},
{
  id:1,
  quocgia: 'hùydfdf, Thái Lan',
  ten: 'HIHIHI',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Thai",
  dataCategory:"nui",link: 'item.html'
},
{
  id:1,
  quocgia: 'CAMPUCHIA',
  ten: 'HOHOHO',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Cam",
  dataCategory:"nui",link: 'item.html'
},
{
  id:1,
  quocgia: 'Indonesia',
  ten: 'hYadfgfdg',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Ind",
  dataCategory:"nui",link: 'item.html'
},
{
  id:1,
  quocgia: 'Lào',
  ten: 'HAHAHA',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Lao",
  dataCategory:"nui",link: 'item.html'
},
{
  id:1,
  quocgia: 'Ninh Bình, Việt Nam',
  ten: 'KIKIKIKI',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Vie",
  dataCategory:"nui",link: 'item.html'
},
{
  id:1,
  quocgia: 'Thái Lan',
  ten: 'HAHAHA',
  info: 'From the shores of the Aegean to the banks of the Grand Canal, a ski retreat in Les Trois Vallées to a Moroccan oasi',
  image:'anh/sp-vn-1.jpg',
  dataCountry : "Thai",
  dataCategory:"nui"
  ,link: 'item.html'
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