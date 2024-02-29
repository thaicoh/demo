var record = 5;
$(document).ready(function () {

    loadLoaiHoa(0, record);

    //Khi nhấn Enter để search
    $("#inp-search").keyup(function (e) {
        if (e.keyCode == 13) {
            loadLoaiHoa(0, record);
        }
    });

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


    queryDataPost("../php/data_get_km.php", datasend, function (res) {
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
                <td>${item.MAKHUYENMAI}</td>
                <td>${item.TENKHUYENMAI}</td>
                <td>${item.NGAYBATDAU}</td>
                <td>${item.NGAYKETTHUC}</td>
                <td>${item.MOTA}</td>
                <td class="d-flex justify-content-between">${item.TILEKHUYENMAI}
                  <div class="thaotac ">
                    <button class="btn-danger btn-sua" data-malh="${item.MAKHUYENMAI}" data-tenlh="${item.TENKHUYENMAI}" data-ngaybd="${item.NGAYBATDAU}" data-ngaykt="${item.NGAYKETTHUC}" data-tile="${item.TILEKHUYENMAI}" data-mota="${item.MOTA}"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                    <button class="btn-danger btn-xoa" data-malh="${item.MAKHUYENMAI}"><i class="fa fa-trash mr-1"> </i>Xóa</button>
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