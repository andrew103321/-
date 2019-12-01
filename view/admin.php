<h3>新增管理指帳號</h3>
<hr>
<form action="./api/add.php" method="post">
<table>
    <tr>
        <td>帳號</td>
        <td><input type="text" name="acc" ></td>
    
    </tr>
    <tr>
        <td>密碼</td>
        <td><input type="text" name="pw" ></td>

    </tr>
    <tr>
        <td>
        <input type="submit" value="按鈕">
        <input type="reset" value="重置">
        <input type="hidden" name="table" value="<?=$_GET['table']?>">
        </td>
        
    </tr>

</table>
</form>