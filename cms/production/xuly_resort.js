
var record = 5;
$(document).ready(function () {

    $(document).ready(function () {
        // Lắng nghe sự kiện khi có thay đổi trên input file
        $('#img').change(function () {
            // Lấy tên file được chọn
            var fileName = $(this).val().split('\\').pop(); // Lấy phần tên file sau dấu gạch chéo cuối cùng
            // Gán tên file vào thuộc tính data-anh của input file
            $(this).attr('data-anh', fileName);

            console.log("Tên file: " + fileName);
        });
    });

    loadCbKND();
    loadHoa(0, record);

    

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




function loadCbKND() {
    //dữ liệu chuẩn bị gửi lên server
    var datasend = {
    }
    //ajax
    queryDataGet("../php/Resort/data_get_cb_knd.php", datasend, function (res) {
        console.log(res)
        var arr = res.items;
        var options = '<option disabled selected value> -- chọn khu nghỉ dưỡng -- </option>';
        for (var x in arr) {
            console.log(arr[x])
            options = options + `
            <option value="${arr[x].MAKND}">${arr[x].TENKND}</option>
            `;
        }
        console.log(options)
        $("#knd").html(options);
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


    queryDataPost("../php/Resort/data_get_hoa_vao_bang.php", datasend, function (res) {
        console.log("chay load data vao bang")
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
                console.log("x: ", arr[x])
                item = arr[x];
                data = data + `
                    <tr>
                    <th scope="row">${i}</th>
                    <td>
                    <div><img src="../${item.IMGTHUMP}" alt="Lamp" width="40" height="28"></div>
                    </td>
                    <td>${item.MARESORT}</td>
                    <td>${item.TENRESORT}</td>
                    <td>${item.TENKND}</td>
                    <td>${item.SOLUONGPHONG}</td>
                    <td>${item.DIENTICH}</td>
                    <td>${item.SOLUONGKHACHTOIDA}</td>
                    <td>${item.DIACHIRESORT}</td>
                    <td>${item.GIATRENDEM}</td>
                    <td>${item.SOLUONGGIUONG}</td>
                

                    <td class="d-flex justify-content-between">${item.LOAIGIUONG}
                    <div class="thaotac">
                        <button class="btn-danger btn-sua" data-maresort="${item.MARESORT}" data-tenknd="${item.MAKND }" data-tenresort="${item.TENRESORT}" data-mota="${item.MOTARESORT}" data-slp="${item.SOLUONGPHONG}"data-slktd="${item.SOLUONGKHACHTOIDA}" data-diachi="${item.DIACHIRESORT}" data-gtd="${item.GIATRENDEM}" data-dientich="${item.DIENTICH}" data-slg="${item.SOLUONGGIUONG}"  data-lg="${item.LOAIGIUONG}" data-anh="${item.IMGTHUMP}"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                        <button class="btn-danger btn-xoa" data-maknd="${item.MARESORT}"><i class="fa fa-trash mr-1"> </i>Xóa</button>
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