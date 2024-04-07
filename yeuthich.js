// Hàm load dữ liệu khu nghỉ dưỡng
function Thich(makh, maknd) {
  return new Promise(function (resolve, reject) {
    // Dữ liệu chuẩn bị gửi lên server
    var datasend = {
      makh: makh,
      maknd: maknd
      // (cookieExists) ? cookieObject['id'] : ''
    };

    console.log(" datasend Thich(): ", datasend)

    queryDataPost("php/insert_thich.php", datasend, function (res) {
      console.log("res Thich: ", res)
      resolve(res);
    });
  });
}

$('.iconUnlike').on('click', function (e) {
    console.log($(this).attr('data-maknd'))

  if (checkCookie('id')) {
    // Sử dụng hàm BoThich để xử lý sự kiện bỏ lưu
    Thich(cookieObject['id'], $(this).attr('data-maknd')).then(function (res) {
      if (res.status != 0) {
        console.log("bỏ lưu thành công")
        location.reload()
      } else {
        console.log("Bỏ lưu thất bại")
      }
    })
  } else {
    alert('Đăng nhập để bỏ lưu!');
  }
});
