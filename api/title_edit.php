<?php
include_once "../base.php";
print_r($_POST['del'])  ;

foreach($_POST['id'] as $key => $id){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        
       del("title",$id);
    }else{
        //更新資料

        // 尋找 id 資料
        $data = find("title",$id);

        // 在抓$_POST["text"] 不知道從何抓起 ，$_POST['id'] 與 $_POST["text"] 是相對的
        // 引此 可以用 $_POST['id'] 的 key的位置 給 $_POST["text"]
        // ["id"  ,"11" "id"  ,"12" "id"  ,"13"]
        // ["text","13212" "text","13212" "text","13212"]
        $data["text"] = $_POST["text"][$key];


        $data['sh'] = ($_POST['sh']==$id)?1:0;

        save("title",$data);
    }
    to("../admin.php?do=title");
}     
?>