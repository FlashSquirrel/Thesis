<?php include ('header.php');?>
<?php 
   require_once('../include.php');
   connect();
   mysql_query("SET NAMES 'utf-8'");
   
  // session_start();
   $id = $_SESSION['id'];
   
   
?>
<p>
  上传文件:
  </p>
<div class="myThesis">
<form method="post" action="form.upload.php" enctype="multipart/form-data">
  <input type="file" name="myFile"/><br/>
  <input type="submit" name="submit1" value="上传该文件" accept=""/>
  <!-- accept:限制上传文件的类型-->
</form>
</div>

<?php include ('footer.php');?>