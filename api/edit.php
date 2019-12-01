<?php
include_once "../base.php";

echo $table = $_POST['table'];
$s = $_POST['id'];
print_r($s);
foreach($_POST['id'] as $key => $id){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        
       del($table,$id);
    }else{
        //更新資料

        // 尋找 id 資料
        $data = find($table,$id);

    switch($table){
        case 'title':
        $data["text"] = $_POST["text"][$key];
        $data['sh'] = ($_POST['sh']==$id)?1:0;
        break;
        case 'admin':
        $data["acc"] = $_POST["acc"][$key];
        $data["pw"] = $_POST["pw"][$key];
        break;
        case 'menu':
        $data["href"] = $_POST["href"][$key];
        $data["text"] = $_POST["text"][$key];
        $data["sh"] = (in_array($id,$_POST['sh']))?1:0;
        break;
        default:
        echo $key;
      echo  $data["text"] = $_POST["text"][$key];
        $data['sh']=(in_array($id,$_POST['sh']))?1:0;

    }    

        save($table,$data);
    }
    to("../admin.php?do=$table");
}     
?>