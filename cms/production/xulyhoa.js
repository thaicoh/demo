var record = 5;
$(document).ready(function () {

    $('#txtgiaban').mask('00000000000', {reverse: true});
    $('#txtsoluong').mask('00000', {reverse: true});

    $(document).ready(function() {
        // Lắng nghe sự kiện khi có thay đổi trên input file
        $('#img').change(function() {
            // Lấy tên file được chọn
            var fileName = $(this).val().split('\\').pop(); // Lấy phần tên file sau dấu gạch chéo cuối cùng
            // Gán tên file vào thuộc tính data-anh của input file
            $(this).attr('data-anh', fileName);

            console.log("Tên file: " + fileName);
        });
    });
    

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
    queryDataGet("../php/data_get_cb_loaihoa.php", datasend, function (res) {
        console.log(res)
        var arr = res.items;
        var options = '<option disabled selected value> -- chọn loại hoa -- </option>';
        for (var x in arr) {
            console.log(arr[x])
            options = options + `
            <option value="${arr[x].MALOAIHOA}">${arr[x].TENLOAIHOA}</option>
            `;
        }
        console.log(options)
        $(".cbloaihoa").html(options);
    })

}

function loadCbKhuyenMai() {
    //dữ liệu chuẩn bị gửi lên server
    var datasend = {
    }
    //ajax
    queryDataGet("../php/data_get_cb_khuyenmai.php", datasend, function (res) {
        console.log(res)
        var arr = res.items;
        var options = `
        <option disabled selected value> -- chọn khuyến mãi -- </option>
        <option  value="" >null</option>
        `;
        for (var x in arr) {
            console.log(arr[x])
            options = options + `
            <option value="${arr[x].MAKHUYENMAI}">${arr[x].TENKHUYENMAI}</option>
            `;
        }
        console.log(options)
        $(".cbkhuyenmai").html(options);
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
    $(".load_LoaiHoa").html('<img class="loading-gif"src="images/g0R5.gif" /><b><i>Đang tải dữ liệu</i></b>');

    queryDataPost("../php/data_get_hoa_vao_bang.php", datasend, function (res) {
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
                console.log(item.MALOAIHOA);
                data = data + `
                    <tr>
                    <th scope="row">${i}</th>
                    <td>
                    <div><img src="images/${item.ANHHOA}" alt="Lamp" width="40" height="28"></div>
                    </td>
                    <td>${item.MAHOA}</td>
                    <td>${item.TENHOA}</td>
                    <td class="click_loaihoa" title="Xem thông tin loại hoa" data-mah="${arr[x].MALOAIHOA}">${item.TENLOAIHOA}</td>
                    <td>${item.GIAHOA} đ</td>
                    <td>${item.SOLUONGCON}</td>
                    <td class="click_khuyenmai" title="Xem thông tin khuyến mãi" data-makm="${arr[x].MAKHUYENMAI}">${(arr[x].MAKHUYENMAI == '') ? "Không có!" : item.TENKHUYENMAI}</td>
                    <td class="d-flex justify-content-between">${item.MOTAHOA}
                    <div class="thaotac">
                        <button class="btn-danger btn-sua" data-gia="${item.GIAHOA}" data-sl="${item.SOLUONGCON}"  data-mah="${item.MAHOA}" data-tenh="${item.TENHOA}" data-mota="${item.MOTAHOA}" data-anh="${item.ANHHOA}"  data-malh="${arr[x].MALOAIHOA}" data-makm="${item.MAKHUYENMAI}"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                        <button class="btn-danger btn-xoa" data-mah="${item.MAHOA}"><i class="fa fa-trash mr-1"> </i>Xóa</button>
                    </div>
                    </td> 
                    </tr>
                `;
                i = i + 1;
            }

            $(".loadhoa").html(data);
            //Phan trang
            buildSlidePage($(".pagenumbernv"), 5, res.page, res.totalpage);
        }
    })
}