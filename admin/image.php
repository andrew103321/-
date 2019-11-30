<?php
  $useTable = "image";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">校園映像資料圖片</p>
  <form method="post"  action="./api/edit.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="60%">校園映像資料圖片</td>
          <td width="15%">顯示</td>
          <td width="15%">刪除</td>
          <td width="10%"></td>
        </tr>
      <?php
        $rows =  all($useTable);
        foreach ($rows as $r){
      ?>
        <tr>
          <td ><img src="./img/<?=$r['file']?>"style="width:120px;height:90px"> </td>
          <td ><input type="checkbox" name="sh[]" value="<?=$r['id']?>" <?=($r['sh'])?"checked":"";?>></td>
          <td ><input type="checkbox" name="del[]" value="<?=$r['id']?>"></td>
          <td ><input type="button"
              onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./view/update_<?=$useTable?>.php?id=<?=$r['id']?>&table=<?=$useTable?>&#39;)" value="更新圖片">
              </td>
              <td ><input type="hidden" name="id[]" value="<?=$r['id']?>"></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <tr>
          <input type="hidden" name="table" value="<?=$useTable?>">
          <td width="200px"><input type="button"
              onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./view/<?=$useTable?>.php?table=<?=$useTable?>&#39;)" value="新增網站標題圖片"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>