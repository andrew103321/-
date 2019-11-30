<?php
  $useTable = "news";
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
  <p class="t cent botli">最新消息資料管理</p>
  <form method="post" action="./api/edit.php">
    <table width="100%">
      <tbody>
        <tr class="yel">
          <td width="80%">最新消息資料內容</td>
          <td width="10%">顯示</td>
          <td width="10%">刪除</td>
        </tr>
        <?php
        $rows = all($useTable);
        foreach ($rows as $r){
        ?>
        <tr >

          <td ><textarea name="text[]" style="width:90%;height:60px" ><?=$r['text']?></textarea></td>
          <td ><input type="checkbox" name='sh[]' value="<?=$r['id']?>" <?=($r['sh'])?"checked":"";?>></td>
          <td><input type="checkbox" name='del[]' value="<?=$r['id']?>"></td>
          <input type="hidden" name='id[]' value="<?=$r['id']?>">
        </tr>
      </tbody>
      <?php                                                              
      }
      ?>
    </table>
    <table style="margin-top:40px; width:70%;">
      <tbody>
        <input type="hidden" name="table" value="<?=$useTable;?>">
        <tr>
        <td width="200px"><input type="button"
              onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./view/<?=$useTable?>.php?table=<?=$useTable?>&#39;)" value="新增網站標題圖片"></td>
          <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
        </tr>
      </tbody>
    </table>

  </form>
</div>