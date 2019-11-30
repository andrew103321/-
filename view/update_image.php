<h3 class="cent">更新標題區圖片</h3>
<hr>
<form action="./api/update_img.php" method="POST" enctype="multipart/form-data">
<table style="width:450px;margin:auto">
    <tr>
        <td>標題區圖片</td>
        <td><input type="file"  name="file" ></td>
    </tr>
    <tr>
        <td colspan="2" class="cent">
        <input type="hidden" name='id' value=<?=$_GET['id']?>>
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置"></input>
        </td>
    </tr>
</table>
</form>
<img src="./" alt="">