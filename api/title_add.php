<?php
include_once "../base.php";

$data=[];
if(!empty($_FILES['file']['tmp_name'])){
    $name = $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'],"../img/".$name);

    // 將檔案名存於陣列
    $data["file"]=$name;
}

     $data['text']=$_POST['text'];

    // //$data => ["file"=>"01b01.jpg","text"=>"asdsad"]

    save("title",$data);
    to("../admin.php?do=title");


?>