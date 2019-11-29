<?php
    include_once "../base.php";


    $data = find("title",$_POST["id"]);
    
            // 新檔案不是空值
        if(!empty($_FILES['file']['tmp_name'])){

            // 將新檔案名子給變數
            $name = $_FILES['file']['name'];
            // 更換路徑
            move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$name);
            // 更換西檔案名子，給舊檔案
            $data['file']=$name;
            // 給資料庫儲存
            save("title",$data);
        }
   
    to("../admin.php?=title");
?>