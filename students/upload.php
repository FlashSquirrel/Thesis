<?php include("header.php");?>
<?php require_once '../include.php'?>

<div class="upload">
  <form action="../home/upload.do.php" method="post" enctype="multipart/form-data" >
    <div class="one" style="padding:5px 360px 4px 0px;">
      文件:
      <input type="file" name="myFile"/><br/>
    </div>
      评论：
            <textarea name="pl" cols="70" rows="5"></textarea><br/>
    <div class="submit">
      <input type="submit" name="submit1" value="上传" accept=""/>
      <!-- accept:限制上传文件的类型-->
      <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
    </div>
  </form>
</div>
<?php include("footer.php");?>

