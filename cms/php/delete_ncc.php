<?php
    require_once("server.php");
        $matl=$_POST["malh"];
       
            $sql="delete from nhacungcap where MANCC='".$matl."'";
                if (mysqli_query($conn, $sql)) {
                        if(mysqli_affected_rows($conn)>0){         
                            $res["success"] = 1; //[1]
                         }else{
                            $res["success"] = 0;
                         }
                }
                else{
                        $res["success"] = 0; //[0] //that bai
                    }
        
        echo  json_encode($res); //trà về client {"success":1}
        mysqli_close($conn);
?>