var record = 5;
$(document).ready(function () {

    loadLoaiHoa(0, record);
    $('#img').on('change', function () {
        var fileName = $(this).val().split('\\').pop(); // Lấy tên file đã chọn
        $(this).attr('data-anh', fileName); // Cập nhật giá trị cho data-anh
    });

    //Khi nhấn Enter để search
    $("#inp-search").keyup(function (e) {
        if (e.keyCode == 13) {
            loadLoaiHoa(0, record);
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


    loadLoaiHoa(0, record);

    //Khi click trang 2 thì di chuyển qua 2 dòng kế tiếp
    var pagecurrent_nv = 0;
    $(".pagenumbernv").on('click', 'button', function () {

        pagecurrent_nv = $(this).val();
        loadLoaiHoa($(this).val(), record);
    })
});



function loadLoaiHoa(page, record) {
    //dữ liệu chuẩn bị gửi lên server
    var search = $("#inp-search").val();

    var datasend = {
        page: page,
        record: record,
        search: search
    }

    //ajax
    $(".load_LoaiHoa").html('<img class="loading-gif"src="images/g0R5.gif" /><b><i>Đang tải dữ liệu</i></b>');

    queryDataPost("../php/Data_get_the_loai2_page.php", datasend, function (res) {
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
                    <div><img src="images/${item.ANHLOAIHOA}" alt="Lamp" width="40" height="28"></div>
                    </td>
                    <td>${item.MALOAIHOA}</td>
                    <td>${item.TENLOAIHOA}</td>
                    <td class="d-flex justify-content-between">${item.MOTALOAIHOA}
                    <div class="thaotac">
                        <button class="btn-danger btn-sua" data-malh="${item.MALOAIHOA}" data-tenlh="${item.TENLOAIHOA}" data-mota="${item.MOTALOAIHOA}" data-anh="${item.ANHLOAIHOA}"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                        <button class="btn-danger btn-xoa" data-malh="${item.MALOAIHOA}"><i class="fa fa-trash mr-1"> </i>Xóa</button>
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