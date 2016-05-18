
<?php
require_once "../include.php";
mysql_query("set names 'utf-8'");
?>
<?php include ("header.php");?>

<form method="post" action="notice.add.do.php">
<table style="padding:0 0 0 170px">
  <tr>
    <td>标题：</td>
    <th>
      <input type="text" style="width:100%;" name="notice_title"/>
    </th>
  </tr>
  <tr>
    <td>内容：</td>
    <th>
      <textarea rows="10" cols="75" style="margin:10px" name="notice_content"></textarea>
    </th>
  </tr>
  <!--  通告附件的上传（未完成）
  <form method="post" action="notice.upload.php">
    <tr>
      <td></td>
      <td>
        <input type="file" name="myFile" value="添加附件"/>
        <input type="submit" value="上传附件"/>
      </td>
    </tr>
  </form>
  -->
</table>

<div style="padding:10px 0px 0px 260px">
    <input type="submit" value="发布"/>
    <input type="button" onclick="javascript:history.back(-1);" value="取消"/>
</div>
 
</form>

<?php include ("../students/footer.php");?>