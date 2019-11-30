<h3>新增校園映像圖片</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data"  style="width:60%;margin:auto">
<table>
    <tr>
        <td>新增校園映像</td>
        <td><input type="file" name="file"></td>
    </tr>
    <tr>
        <td>
            <input type="hidden" name='table' value="<?=$_GET['table'];?>" >
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </td>
    </tr>


</table>
</form>