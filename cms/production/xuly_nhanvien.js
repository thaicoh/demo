var record = 5;

$('#email').change(function () {
    var status = false;
    var email = $('#email').val();
    var emailLength = email.length;
    if (email != "" && emailLength > 4) {
        email = email.replace(/\s/g, "");  //To remove space if available
        var dotIndex = email.indexOf(".");
        var atIndex = email.indexOf("@");

        if (dotIndex > -1 && atIndex > -1) {   //To check (.) and (@) present in the string
            if (dotIndex != 0 && dotIndex != emailLength && atIndex != 0 && atIndex != emailLength && email.slice(email.length - 1) != ".") {   //To check (.) and (@) are not the firat or last character of string
                var dotCount = email.split('.').length
                var atCount = email.split('@').length

                if (atCount == 2 && (dotIndex - atIndex > 1)) { //To check (@) present multiple times or not in the string. And (.) and (@) not located subsequently
                    status = true;
                    if (dotCount > 2) {    //To check (.) are not located subsequently
                        for (i = 2; i <= dotCount - 1; i++) {
                            if (email.split('.')[i - 1].length == 0) {
                                status = false;
                            }
                        }
                    }
                }
            }
        }

        console.log(status)

    }

    $('#Email').val(email);
    if (!status) {
        alert("Sai định dạng email! hãy nhập lại");
    }
});




$(document).ready(function () {
    $('#sdt').mask('00000000000');

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


    queryDataPost("../php/data_get_nhanvien.php", datasend, function (res) {
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
                data = data + `
                <tr>
                <th scope="row">${i}</th>
                <td>${item.MANV}</td>
                <td>${item.TENNV}</td>
                <td>${(item.GTNV == 0) ? "Nữ" : "Nam"}</td>
                <td>${item.NSNV}</td>
                <td>${item.DIACHINV}</td>
                <td>${item.EMAILNV}</td>
                <td class="d-flex justify-content-between">${item.SDTNV}
                  <div class="thaotac ">
                    <button class="btn-danger btn-sua" data-malh="${item.MANV}" data-tenlh="${item.TENNV}" data-gt="${item.GTNV}" data-email="${item.EMAILNV}" data-diachi="${item.DIACHINV}" data-sdt="${item.SDTNV}" data-ns="${item.NSNV}"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                    <button class="btn-danger btn-xoa" data-malh="${item.MANV}"><i class="fa fa-trash mr-1"> </i>Xóa</button>
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