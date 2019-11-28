<?php
    include_once "../base.php";


    $bottom = find("bottom",1);
    $bottom['bottom'] = $_POST['bottom'];

    save("bottom",$bottom);

    to("adimn.php?do=bottom");


?>
