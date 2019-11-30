<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=db13";
$pdo = new PDO($dsn,'root','');
session_start();

// 判斷網站進站，是否$_SESSION有值嗎? 
if(empty($_SESSION['total'])){

    // 抓出人數，後加一
    $total = find("total",1);
    $total['total'] = $total['total']+1;

    // 我將值給  $_SESSION 來防止 重複進入
    $_SESSION['total']=$total['total'];

    save("total",$total);
}


// .... 為可以用很多變數
// select * form table where id=xxx or aaa=xxx && bbb=yyy
//用於收尋(單一)
function find($table,...$arg){
    global $pdo;

    $sql = "select * from $table where ";

    if(is_array($arg[0])){

        //["acc"=>"maclk","pw"=>"1234"];
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'" ,$key,$value);
        }
        //tmp["`acc`"=>'maclk',"`pw`"=>'1234'];
        // 陣列字串化 implod  每次以 " && " 劃分   "acc"='maclk' && "pw"='1234'
        $sql = $sql . implode(" && " ,$tmp);


    }else{
        //不陣列的話預設是id

        $sql = $sql ."id='".$arg[0]."'";
    }

    // echo $sql;

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}







function all($table,...$arg){
    global $pdo;

    $sql="select * from $table ";

    if(!empty($arg[0])){
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'",$key,$value);
        }

        $sql = $sql . " where " . implode(" && ",$tmp);

    }

    if(!empty($arg[1])){
        $sql=$sql . $arg[1];
    }
    // echo $sql . "<BR>";

   return $pdo->query($sql)->fetchAll();
   
}
//  $rows  = all("admin",["acc"=>'root'],"limit 2");
//     echo "<br>";
//     print_r($rows);



//計數用
function nums($table,...$arg){
    global $pdo;

    $sql = "select count(*) from $table ";
    
    if(!empty($arg[0])){
        
        foreach($arg[0] as $key => $value){
            $tmp[]=sprintf("`%s`='%s'" ,$key,$value);
        }
     
        $sql = $sql . "where" . implode(" && " ,$tmp);

    }
    if(!empty($arg[1])){
        $sql = $sql .$arg[1];
    }
    // echo $sql ."<br>";
    
    return $pdo->query($sql)->fetchColumn();
}
    // echo "資料表比數<br>";
    // echo nums("admin",['pw'=>"1234"]);



    function q($sql){
        global $pdo;

        return $pdo->query($sql)->fetchALL();
    }
    // print_r (q("select acc from admin"));



//刪除特定id或符合條件資料
    function del($table,...$arg){
        global $pdo;

        $sql = "delete from $table where ";
        
        if(is_array($arg[0])){

            foreach($arg[0] as $key => $value){
                $tmp[] = sprintf("`%s`='%s'",$key,$value);
            }
            $sql = $sql .impload( " && " ,$tmp);  

        }else{
            //不是陣列的話預設id
            $sql = $sql ."id='".$arg[0]."'";
        }
         echo $sql;
        return $pdo->exec($sql);
    }

    // echo del("admin",3);
    // echo del(admin,["acc"=>""]);

    //連結用
    function to($path){
        header("location:".$path);
    }

    // to("adimn.php?do=bottom");

    function save($table,$data){
        global $pdo;

        

        if(!empty($data['id'])){
            //update
            
            foreach($data as $key => $value){
                if($key != "id"){ 

                $tmp[]=sprintf("`%s`='%s'" ,$key,$value);
            }
            }
       
                $sql = "update $table SET ".(implode(",",$tmp))." WHERE `id`='".$data['id']."'";
            
        }else{
            //insert
            $key = array_keys($data);
            $keys_str="`" . implode("`,`",$key) ."`"; //acc`,`pw
            $value_str="'" . implode("','",$data) . "'";

            // 暴力打法
             //"insert into $table (`".implode("`,`",array_keys($data))."`) value('".implode("','",$data)."')";

            $sql = " insert into $table ($keys_str)  values ($value_str)";


        }
            

             return $pdo->exec($sql);
    }

    

?>
