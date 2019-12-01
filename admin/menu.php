<?php
  $useTable = "menu";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">選單管理</p>
  <form method="post"  action="./api/edit.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="45%">主選單名稱</td>
          <td width="23%">選單連結網址</td>
          <td width="7%">次選單數</td>
          <td width="7%">顯示</td>
          <td width="7%">刪除</td>
          <td></td>
        </tr>
        <?php
          $rows = all($useTable);
          foreach ($rows as $r ) {
        ?>
        <tr>
          <td width="45%"><input type="text" name="text[]" value="<?=$r["text"]?>"></td>
          <td width="23%"><input type="text" name="href[]" value="<?=$r["href"]?>"></td>
          <td></td>
          <td width="7%"><input type="checkbox" name="sh[]" value="<?=$r["id"]?>" <?=($r["sh"])?"checked":""?>></td>
          <td width="7%"><input type="checkbox" name="del[]" value="<?=$r["id"]?>"></td>
          <td width="200px"><input type="button"
              onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;view.php?do=title&#39;)" value="新增網站標題圖片"></td>
             <td> <input type="hidden" name='id[]' value="<?=$r['id']?>"></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
      <input type="hidden" name="table" value="<?=$useTable?>">
        <tr>
          <td width="200px"><input type="button"
              onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./view/<?=$useTable?>.php?table=<?=$useTable?>&#39;)" value="新增網站標題圖片"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>