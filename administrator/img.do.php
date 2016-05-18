
<?php 
   require_once('../include.php');
   connect();
   mysql_query("SET NAMES 'utf-8'");
?>
<?php include ('header.php');?>

<div class="img">
<form method="post" action="img.upload.php" enctype="multipart/form-data">
  <input type="file" name="myFile"/><br/>
  <input type="submit" name="submit1" value="上传该文件" accept=""/>
  <!-- accept:限制上传文件的类型-->
</form>
</div>

<?php include ('../students/footer.php');?>