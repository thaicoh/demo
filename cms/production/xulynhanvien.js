$(document).ready(function () {
    var record = 2;
    console.log("ok hi");
    //Khi nhấn Enter để search
    $(".txtsearchnv").keyup(function (e) {
        if (e.keyCode == 13) {
            showDataNhanVien(0, record);
        }
    });

    $(".btnshowhidenhanvien").click(function () {
        $(".frmnhanvienchitiet").toggle(1000);
    })


    $(".btnshowhidenhanvienad").click(function () {
        var value = $(this).html();
        console.log(value)
        if (value == '<i class="fa fa-plus"></i>') {
            $(".btnshowhidenhanvienad").html('<i class="fa fa-minus"></i>');
        } else {
            $(".btnshowhidenhanvienad").html('<i class="fa fa-plus"></i>');
        }
        $(".frmnhanvienchitiet").toggle(1000);
    })


    showDataNhanVien(0, record);

    //Khi click trang 2 thì di chuyển qua 2 dòng kế tiếp
    var pagecurrent_nv = 0;
    $(".pagenumbernv").on('click', 'button', function () {
        pagecurrent_nv = $(this).val();
        showDataNhanVien($(this).val(), record);
    })
});



function showDataNhanVien(page, record) {
    //dữ liệu chuẩn bị gửi lên server
    var search = $(".txtsearchnv").val();
    var datasend = {

        page: page,
        record: record,
        search: search

    }

    queryDataPost("php/Data_get_the_loai2_page.php", datasend, function (res) {
        var stt = 1;
        var currentpage = parseInt(res.page);
        stt = printSTT(record, currentpage);
        var data = res.items;

        if (data.length == 0) {
            $(".addListNV").html("không có dữ liệu");
            $(".pagenumbernv").html("");
        } else {
            var htmls = '';
            for (var item in data) {
                var obj = data[item];
                htmls = htmls + '<tr>' +
                    '<td>' + stt + '</td>' +
                    '<td>' + obj.manv + '</td>' +
                    '<td>' + obj.tennv + '</td>' +

                    '<td>' + obj.tenpb + '</td>' +
                    '<td>' +
                    '<label class="badge badge-success"><i class="fa fa-plus"></i>&nbsp;Thêm</label>&nbsp;' +
                    '<label class="badge badge-success"><i class="fa fa-trash-o"></i>&nbsp;Xóa</label>&nbsp;' +
                    '<label class="badge badge-success"><i class="fa fa-eye"></i>&nbsp;Xem</label>' +
                    '</td>' +
                    '</tr>';
                stt++;
            }

            //	console.log(htmls);
            $(".addListNV").html(htmls);
            //Phan trang
            buildSlidePage($(".pagenumbernv"), 5, res.page, res.totalpage);
        }
    })
}