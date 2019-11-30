<h3>動態文字廣告管理</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data" style="width:60%;margin:auto">
<table>
<tr>
    <td>動態文字廣告</td>
    <td><input type="text" name="text"></td>
</tr>
<tr>
    <td>
        <input type="hidden" name="table" value="<?=$_GET["table"];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </td>
</tr>




</form>