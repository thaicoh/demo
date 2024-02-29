$(document).ready(function () {

    $('#img').on('change', function () {
        var fileName = $(this).val().split('\\').pop(); // Lấy tên file đã chọn
        $(this).attr('data-anh', fileName); // Cập nhật giá trị cho data-anh
    });

    // Xử lý nút nhấn tìm kiếm
    $('#inp-search').keypress(function (e) {
        if (e.key == "Enter") {
            console.log($('#inp-search').val())
            loadLoaiHoa($('#inp-search').val());
        }
    })

    console.log("jquery ok");
    loadLoaiHoa("");
});



function loadLoaiHoa(str) {
    var datasend = {
        search: str
    }

    //ajax
    $(".load_LoaiHoa").html('<img class="loading-gif"src="images/g0R5.gif" /><b><i>Đang tải dữ liệu</i></b>');
    queryDataGet("../php/search_loaihoa.php", datasend, function (res) {
        // console.log(res);
        var arr = res.items;
        if (arr.length == 0) {
            $(".addDataChuDe").html("Dữ liệu chưa được cập nhật");
        } else {
            var data = '';
            var i = 1;
            for (var x in arr) {
                item = arr[x];
                // console.log(item.MALOAIHOA);
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
        }
    })
}