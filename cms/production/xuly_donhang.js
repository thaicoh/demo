var record = 5;
var MAKH = "";
var MANV = "";
var cartItems = []; // Mảng để lưu thông tin hàng trong giỏ
var addButton = document.querySelector('.btn-themvaogiohang');
var tableBody = document.querySelector('table tbody');
var productsSelect = document.getElementById('products');
var quantityInput = document.getElementById('quantity');
var totalPriceDisplay = document.querySelector('.tongtien');

function resetSelectAndQuantity() {
    var selectElement = document.getElementById('products');
    var quantityInput = document.getElementById('quantity');

    // Bỏ chọn select
    selectElement.selectedIndex = -1;

    // Đặt lại số lượng về giá trị mặc định (ví dụ: 1)
    quantityInput.value = 1;
}



document.addEventListener("DOMContentLoaded", function () {
    addButton.disabled = true; // Bắt đầu khi nút thêm vào giỏ hàng được vô hiệu hóa

    // Xử lý sự kiện khi lựa chọn sản phẩm thay đổi
    productsSelect.addEventListener('change', function () {
        var selectedOption = productsSelect.options[productsSelect.selectedIndex];
        var sl = parseInt(selectedOption.getAttribute('data-sl'));

        // Kiểm tra xem sản phẩm đã chọn hay chưa
        addButton.disabled = isNaN(sl) || sl < 1;
    });

    addButton.addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của form

        // Lấy thông tin sản phẩm và số lượng
        var selectedOption = productsSelect.options[productsSelect.selectedIndex];
        var ma = selectedOption.getAttribute('data-ma');
        var ten = selectedOption.getAttribute('data-ten');
        var sl = parseInt(selectedOption.getAttribute('data-sl'));
        var gia = parseInt(selectedOption.getAttribute('data-gia'));
        var quantity = parseInt(quantityInput.value);

        // Xử lý thêm vào giỏ hàng và cập nhật bảng
        var existingItem = cartItems.find(item => item.ma === ma);
        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            cartItems.push({ ma, ten, quantity, gia });
        }

        renderCartItems();

        updateTotalPrice();
        addButton.disabled = true; // Vô hiệu hóa nút sau khi thêm vào giỏ hàng
        resetSelectAndQuantity()

    });


});
// Xử lý sự kiện khi nhấn nút xóa
function deleteCartItem(index) {
    cartItems.splice(index, 1); // Xóa phần tử tương ứng trong mảng cartItems
    renderCartItems(); // Cập nhật lại bảng giỏ hàng
    updateTotalPrice(); // Cập nhật tổng tiền
}

// Tạo một hàm để render lại bảng giỏ hàng
function renderCartItems() {
    // Xóa hết các hàng cũ trong bảng
    while (tableBody.firstChild) {
        tableBody.removeChild(tableBody.firstChild);
    }

    // Thêm các hàng mới dựa trên dữ liệu trong cartItems
    cartItems.forEach((item, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td>${item.ma}</td>
        <td>${item.ten}</td>
        <td>${item.quantity}</td>
        <td>${item.gia.toLocaleString()}vnd</td>
        <td><button onclick="deleteCartItem(${index})">Xóa</button></td>
    `;
        tableBody.appendChild(row);
    });
}

// Cập nhật tổng tiền sau khi xóa hàng
function updateTotalPrice() {
    var total = cartItems.reduce((acc, item) => acc + item.gia * item.quantity, 0);
    totalPriceDisplay.textContent = `Tổng tiền: ${total.toLocaleString()}vnd`;
}





document.addEventListener("DOMContentLoaded", function () {
    var quantityInput = document.getElementById('quantity');
    var maxQuantityWarning = document.getElementById('maxQuantityWarning');
    var selectProduct = document.getElementById('products');
    var addToCartButton = document.querySelector('.btn-themvaogiohang');

    selectProduct.addEventListener('change', function () {
        var selectedOption = selectProduct.options[selectProduct.selectedIndex];
        var maxQuantity = parseInt(selectedOption.getAttribute('data-sl'));
        quantityInput.setAttribute('max', maxQuantity);
    });

    quantityInput.addEventListener('input', function () {
        var selectedOption = selectProduct.options[selectProduct.selectedIndex];
        var maxQuantity = parseInt(selectedOption.getAttribute('data-sl'));
        var enteredQuantity = parseInt(quantityInput.value);

        if (enteredQuantity > maxQuantity) {
            maxQuantityWarning.classList.remove('d-none');
            addToCartButton.disabled = true;
        } else {
            maxQuantityWarning.classList.add('d-none');
            addToCartButton.disabled = false;
        }
    });
});



// su kien so luong toi da cb hoa
document.addEventListener("DOMContentLoaded", function () {
    var quantityInput = document.getElementById('quantity');
    var selectProduct = document.getElementById('products');

    selectProduct.addEventListener('change', function () {
        var selectedOption = selectProduct.options[selectProduct.selectedIndex];
        var maxQuantity = selectedOption.getAttribute('data-sl');
        quantityInput.setAttribute('max', maxQuantity);
    });
});

$(document).ready(function () {

    $('.cbnv').change(function() {
         MANV = $(this).val();
        console.log("MANV đã chọn: ", MANV);
        // Tiếp tục với logic xử lý sau khi có giá trị MANV
    });

    // Lắng nghe sự kiện khi chọn option
    document.querySelector('.cbkh').addEventListener('change', function (event) {
        // Lấy ra option đã chọn
        const selectedOption = event.target.options[event.target.selectedIndex];

        // Lấy thông tin từ các thuộc tính data-
        const ma = selectedOption.getAttribute('data-ma');
        const ten = selectedOption.getAttribute('data-ten');
        const sdt = selectedOption.getAttribute('data-sdt');
        const email = selectedOption.getAttribute('data-email');

        // In thông tin từ các thuộc tính data-
        console.log('Mã:', ma);
        console.log('Tên:', ten);
        console.log('SĐT:', sdt);
        console.log('Email:', email);

        $('.idkh').html(ma)
        $('.tenkh').html(ten)
        $('.sdtkh').html(sdt)
        $('.emailkh').html(email)

        $('.btnXacNhan').click(function () {
            MAKH = ma;
            $('.khachhangvuathem').html(`${ten} - ${ma}`)
            $('.modal_khcu').modal('hide');
        })
    });

    $(".btnluu").click(function () {
        console.log("them du lieu ");
        var datasend = {
            maKH: $("#malh").val(),
            tenKH: $("#tenlh").val(),
            diaChiKH: $("#des1").val(),
            sdtKH: $("#sdt").val(),
            gtKH: $("#gt").val(),
            emailKH: $("#email").val()
        }
        //dữ liệu chuẩn gửi lên server dạng đối tượng
        console.log(datasend);
        queryDataPost("../php/insert_khachhang.php", datasend, function (res) {
            console.log(res);
            if (res.success == 1) {
                bootbox.alert("Thêm thành công!");
                // loadLoaiHoa(0, record);

                $('.khachhangvuathem').html(`${$("#tenlh").val()} - ${$("#malh").val()}`)

            }
            else if (res.success == 0) {
                bootbox.alert("Không thể kết nối với server!");
            }
            else {
                bootbox.alert("Trùng mã loại hoa!");
            }
        })

        MAKH = $("#malh").val();
        $('.modal_khmoi').modal('hide');
    })




    $('#radio1').click(function () {
        // Code xử lý khi radio1 được click
        console.log('Radio 1 được chọn');

        $('.modal_khmoi').modal('show');

    });

    $('#radio2').click(function () {
        // Code xử lý khi radio2 được click
        console.log('Radio 2 được chọn');
        $('.modal_khcu').modal('show');
    });


    // $(".loadhoa").on('click', '.click_loaihoa', function () {
    //     var maloaihoa = $(this).attr("data-mah");
    //     console.log(maloaihoa)
    //     var datasend = {
    //         maloaihoa: maloaihoa
    //     }
    //     console.log("chay")
    //     queryDataPost("../php/data_get_the_loai.php", datasend, function (res) {
    //         console.log("res1", res.items)

    //         $('.shownxb').modal('show');
    //         var ar = res.items;

    //         $(".addmaloaihoa").html(ar[0].MALOAIHOA);
    //         $(".addtenloaihoa").html(ar[0].TENLOAIHOA);
    //         $(".addmotaloaihoa").html(ar[0].MOTALOAIHOA);
    //         $(".addanhloaihoa").html(

    //             `<div><img src="images/${ar[0].ANHLOAIHOA}" alt="Lamp" width="200" height="100"></div>`
    //         );
    //     })
    // })






    loadCbHoa();
    loadCbLoaiHoa();
    loadCbKhuyenMai();
    loadHoa(0, record);

    loadCbLoaiHoa(0, record);

    //Khi click trang 2 thì di chuyển qua 2 dòng kế tiếp
    var pagecurrent_nv = 0;
    $(".pagenumbernv").on('click', 'button', function () {

        pagecurrent_nv = $(this).val();
        loadHoa($(this).val(), record);
    })
});

//Khi nhấn Enter để search
$("#inp-search").keyup(function (e) {
    if (e.keyCode == 13) {
        console.log("chay click")
        loadHoa(0, record);
    }
});

// $(".btnshowhidenhanvien").click(function () {
//     $(".frmnhanvienchitiet").toggle(1000);
// })


// $(".btnshowhidenhanvienad").click(function () {
//     var value = $(this).html();
//     console.log(value)
//     if (value == '<i class="fa fa-plus"></i>') {
//         $(".btnshowhidenhanvienad").html('<i class="fa fa-minus"></i>');
//     } else {
//         $(".btnshowhidenhanvienad").html('<i class="fa fa-plus"></i>');
//     }
//     $(".frmnhanvienchitiet").toggle(1000);
// })




function loadCbLoaiHoa() {
    //dữ liệu chuẩn bị gửi lên server
    var datasend = {
    }
    //ajax
    queryDataGet("../php/data_get_cb_khachhang.php", datasend, function (res) {
        console.log(res)
        var arr = res.items;
        var options = `
            <option disabled selected value=""> -- Chọn Khách hàng --
            </option>
        `;
        for (var x in arr) {
            console.log(arr[x])
            options = options + `
            <option value="${arr[x].MAKH}" data-ma="${arr[x].MAKH}" data-ten="${arr[x].TENKH}" data-sdt="${arr[x].SDTKH}" data-email="${arr[x].EMAILKH}">${arr[x].TENKH} - ${arr[x].MAKH}</option>
            `;
        }
        // console.log(options)
        $(".cbkh").html(options);
    })

}


function loadCbKhuyenMai() {
    //dữ liệu chuẩn bị gửi lên server
    var datasend = {
    }
    //ajax
    queryDataGet("../php/data_get_cb_nhanvien.php", datasend, function (res) {
        console.log(res)
        var arr = res.items;
        var options = `
        <option disabled selected value> -- chọn nhân viên -- </option>
        `;
        for (var x in arr) {
            console.log(arr[x])
            options = options + `
            <option value="${arr[x].MANV}">${arr[x].TENNV} - ${arr[x].MANV}</option>
            `;
        }
        console.log(options)
        $(".cbnv").html(options);
    })
}

function loadCbHoa() {
    //dữ liệu chuẩn bị gửi lên server
    var datasend = {
    }
    //ajax
    queryDataGet("../php/data_get_cb_hoa.php", datasend, function (res) {
        console.log(res)
        var arr = res.items;
        var options = `
            <option disabled selected value=""> -- Chọn Hoa --
            </option>
        `;
        for (var x in arr) {
            console.log(arr[x])
            if (arr[x].SOLUONGCON > 0) {
                options = options + `
                    <option value="${arr[x].MAHOA}" data-gia="${arr[x].GIAHOA}" data-ma="${arr[x].MAHOA}" data-ten="${arr[x].TENHOA}" data-sl="${arr[x].SOLUONGCON}" data-email="${arr[x].EMAILKH}">${arr[x].TENHOA}  (${arr[x].SOLUONGCON})</option>
                    `;
            }

        }
        console.log(options)
        $(".cb_hoa").html(options);
    })

}

function loadHoa(page, record) {
    //dữ liệu chuẩn bị gửi lên server
    var search = $("#inp-search").val();

    var datasend = {
        page: page,
        record: record,
        search: search
    }

    //ajax

    queryDataPost("../php/data_get_donhang.php", datasend, function (res) {
        console.log("res", res)
        var stt = 1;
        var currentpage = parseInt(res.page);
        stt = printSTT(record, currentpage);
        var arr = res.items;

        if (arr.length == 0) {
            $(".addDataChuDe").html("Dữ liệu chưa được cập nhật");
            $(".pagenumbernv").html("");
        } else {
            var data = '';
            var i = 1;
            for (var x in arr) {
                item = arr[x];
               
                // <td class="click_loaihoa" title="Xem thông tin loại hoa" data-mah="${arr[x].MALOAIHOA}">${item.TENLOAIHOA}</td>
                // <td class="click_khuyenmai" title="Xem thông tin khuyến mãi" data-makm="${arr[x].MAKHUYENMAI}">${(arr[x].MAKHUYENMAI == '') ? "Không có!" : item.TENKHUYENMAI}</td>

                data = data + `
                    <tr>
                    <th scope="row">${i}</th>
                    <td>${item.MADONHANG}</td>
                    <td>${item.TENKH}</td>
                    <td>${item.TENNV}</td>
                    <td>${item.NGAYDAT}</td>
                    <td>${item.GHICHU}</td> 
                   
                    <td class="d-flex justify-content-between">${item.TONGHOADON} vnd
                    <div class="thaotac">
                        <button class="btn-danger btn-xem" data-mah="${item.MADONHANG}" data-makh="${item.MAKH}"
                        data-tenkh="${item.TENKH}" data-manv="${item.MANV}"
                        data-tennv="${item.TENNV}" data-ghichu="${item.GHICHU}"
                        data-ngaydat="${item.NGAYDAT}" data-tonghd="${item.TONGHOADON}"

                        ><i class="fa fa-eye mr-1"> </i>Xem chi tiết</button>
                        <button class="btn-danger btn-sua" ><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                        <button class="btn-danger btn-xoa" data-madh="${item.MADONHANG}"><i class="fa fa-trash mr-1"> </i>Xóa</button>
                    </div>
                    </td> 
                    </tr>
                `;
                i = i + 1;
            }

            $(".load_LoaiHoa").html(data);
            //Phan trang
            buildSlidePage($(".pagenumbernv"), 5, res.page, res.totalpage);
        }
    })
}