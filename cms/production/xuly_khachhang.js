var record = 5;
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
    $(".load_LoaiHoa").html('<img class="loading-gif"src="images/g0R5.gif" /><b><i>Đang tải dữ liệu</i></b>');


    queryDataPost("../php/KhachHang/data_get_khachhang.php", datasend, function (res) {
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
                item = arr[x];

                let gt = "null"
                let vaitro = "null"
                if (item.GIOITINH == 0) {
                    gt = "Nữ"
                } else if (item.GIOITINH == 1) {
                    gt = "Nam"
                }
                if (item.VAITRO == 0) {
                    vaitro = "Thường"
                } else if (item.VAITRO == 1) {
                    vaitro = "@admin"
                }

                data = data + `
                <tr>
                <th scope="row">${i}</th>
                <td>
                <div><img src="../${item.ANHKH}" alt="Lamp" width="40" height="28"></div>
                </td>
                <td>${item.MAKH}</td>
                <td>${item.TENKH}</td>
                <td>${item.SDTKH}</td>
                <td>${item.EMAILKH}</td>
                <td>${vaitro}</td>
                <td>${gt}</td>
                
                <td class="d-flex justify-content-between"> 
                  <div class="thaotac ">
                    <button class="btn-danger btn-sua" data-malh="${item.MAKH}" data-tenlh="${item.TENKH}" data-mk="${item.MATKHAUKH}" data-gt="${item.GIOITINH}" data-vaitro="${item.VAITRO}" data-email="${item.EMAILKH} "data-sdt="${item.SDTKH}" data-anh="${item.ANHKH}"><i class="fa fa-pencil-square-o mr-1"> </i>Sửa</button>
                    <button class="btn-danger btn-xoa" data-malh="${item.MAKH}"><i class="fa fa-trash mr-1"> </i>Xóa</button>
                    
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