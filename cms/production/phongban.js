$(document).ready(function(){
  var flag=0;//Chưa có thao tác thêm hoăc sua
  //Khi nhấn Enter để search
  $(".txtsearchpb").keyup(function(e){
    if(e.keyCode == 13)
    {
      var s=$(".txtsearchpb").val();
        console.log(s);
       loadPhongban(s);
    }
  });
  //Nhấn nút làm lại
  $(".btnlamlaipb").click(function(){
    resetPB();
    flag=0;
  });
  //Đóng modal
  $(".btnexitmodal").click(function(){
    $('.modal_insertphongban').modal('hide');
    flag=0;
  })
  $(".btnsavepb").click(function(){
    if( flag==1){
       //thêm mới
    console.log("ok");
    var ma=$(".txtmapb").val();
    var ten=$(".txttenpb").val();
    var dd=$(".txtdiadiem").val();
    if(ma.length!=5){
      bootbox.alert('Mã Phòng ban phải 5 ký tự');
    }else if(ten==""){
      bootbox.alert('Tên Phòng ban khác khoảng trống');
    }else{
    var datasend={
      mapb:ma,
      tenpb:ten,
      diadiem:dd
    }
    
    console.log("send to server:");
    console.log(datasend)
    queryDataPost("php/insert_phongban.php",datasend,function(res){
        console.log(res)
        if(res.success==1){
          //alert("Thành cong")
          bootbox.alert('Thành cong');
          loadPhongban("");
          resetPB();
         
        }else if(res.success==2){
          //alert("Trùng mã ")
          bootbox.alert('Đã trùng mã phòng ban');
        }else{
          //alert("Thất bại ")
          bootbox.alert('Lỗi khi thêm');
        }
    });
    }
  }
  else if(flag==2){
          //bootbox.alert('Update');
          var ma=$(".txtmapb").val();
    var ten=$(".txttenpb").val();
    var dd=$(".txtdiadiem").val();
    if(ma.length!=5){
      bootbox.alert('Mã Phòng ban phải 5 ký tự');
    }else if(ten==""){
      bootbox.alert('Tên Phòng ban khác khoảng trống');
    }else{
    var datasend={
      mapb:ma,
      tenpb:ten,
      diadiem:dd
    }
    

    queryDataPost("php/update_phongban.php",datasend,function(res){
        console.log(res)
        if(res.success==1){
          //alert("Thành cong")
          bootbox.alert('Update Thành cong');
          loadPhongban("");
          resetPB();
         
        }else{
          //alert("Thất bại ")
          bootbox.alert('Lỗi khi update');
        }
    });
    }
  }
  })
    $(".btnthemmoiphongban").click(function(){
      flag=1;//Người dùng đang muốn thêm dữ liệu
      $(".btnsavepb").show();
      $(".btnlamlaipb").show();
      $(".btnsavepb").html('<i class="fa fa-plus"></i>Lưu');
      resetPB();
        $(".modal_insertphongban").modal('show'); 

    })
    loadPhongban("");
    //Bắt sự kiện khi click vào 1 dòng của table

    $(".adddatapb").on('click','.click_xoa',function(){
      console.log("click xóa");
      console.log($(this).html());
      var mapb=$(this).attr("data-mapb");
      console.log(mapb);
      bootbox.confirm('Bạn có chắc là xóa phòng ban có mã số này không!'+mapb,
              function(result) {
                                console.log('This was logged in the callback: ' + result);
                                if(result==true){
                                      var dataSend={
                                        mapb:mapb
                                      }
                                      queryDataGet("php/delete_phongban.php", dataSend, function (res) {
                                         if(res.success==1){
                                          bootbox.alert('Xóa Thành công');
                                          loadPhongban("");
                                         }else{
                                          bootbox.alert('Xóa không Thành công');
                                         }
                                      });

                                }else{
                                  //khong lam gi ca
                                }
              });
    })
    $(".adddatapb").on('click','.click_xem',function(){
      console.log("click xem du lieu");
      console.log($(this).html());
      var mapb=$(this).attr("data-mapb");
      var tenpb=$(this).attr("data-tenpb");
      var diadiem=$(this).attr("data-diadiem");
      $('.modal_insertphongban').modal('show');
      $(".txtmapb").val(mapb);
      $(".txttenpb").val(tenpb);
      $(".txtdiadiem").val(diadiem);
      $(".btnsavepb").hide();
      $(".btnlamlaipb").hide();
    })
    $(".adddatapb").on('click','.click_sua',function(){
      console.log("click sua du lieu");
      console.log($(this).html());
      var mapb=$(this).attr("data-mapb");
      var tenpb=$(this).attr("data-tenpb");
      var diadiem=$(this).attr("data-diadiem");
      $('.modal_insertphongban').modal('show');
      $(".txtmapb").val(mapb);
      $(".txttenpb").val(tenpb);
      $(".txtdiadiem").val(diadiem);
      $(".btnsavepb").show();
      $(".btnsavepb").html('<i class="fa fa-plus"></i>Cập nhật');
      $(".btnlamlaipb").show();
      flag=2;//Người dùng đang thao tác sửa dữ liệu
    })
});
function resetPB(){
  $(".txtmapb").val("");
  $(".txttenpb").val("");
  $(".txtdiadiem").val("");
  $(".txtmapb").focus();
}
function loadPhongban(s){
    var dataSend = {
        search:s
    }
    $(".adddatapb").html('<img src="images/loading.gif" height="30px" width="30px" />Đang lấy dữ liệu');
    queryDataGet("php/data_get_phong_ban.php", dataSend, function (res) {
         console.log(res);
        var arr = res.items;
        var content='';
        var i=1;
        if(arr.length==0){
          $(".adddatapb").html("Không tìm thấy");
        }else{
           for( var x in arr){
               var item=arr[x];
               console.log(item.MAPB);
               content=content+ '<tr>'+
               '<td>'+i+'</td>'+
               '<td>'+item.MAPB+'</td>'+
               '<td>'+item.TENPB+'</td>'+
               '<td>'+item.DIADIEM+'</td>'+
             
               '<td>'+
                 '<label class="badge badge-success click_sua" data-mapb="'+item.MAPB+'" data-tenpb="'+item.TENPB+'" data-diadiem="'+item.DIADIEM+'"><i class="fa fa-save"></i>&nbsp;Sửa</label>&nbsp;'+
                 '<label class="badge badge-success click_xoa" data-mapb="'+item.MAPB+'"><i class="fa fa-trash-o"></i>&nbsp;Xóa</label>&nbsp'+
                 '<label class="badge badge-success click_xem" data-mapb="'+item.MAPB+'" data-tenpb="'+item.TENPB+'" data-diadiem="'+item.DIADIEM+'"><i class="fa fa-eye"></i>&nbsp;Xem</label>'+
               '</td>'+
             '</tr>';
             i++;
           }
        //gán code html vào trang web 
       $(".adddatapb").html(content);
          }
    });
}
