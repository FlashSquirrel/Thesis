<?php include ('header.php');?>
<?php 
   require_once('../include.php');
   connect();
   mysql_query("SET NAMES 'utf-8'");
   
   $thesis_id = $_GET['id'];
   $submit = $_GET['submit'];
    

?>
<style>
  span{font-size:17px;}
</style>
<div class="upload" style="margin:50px 100px">
  
<span>
  上传文件:
  </span>
  <?php if($submit=='申报表'){?>
<form method="post" action="thesisTopic.upload.php?submit=申报表& id=<?=$thesis_id?>" enctype="multipart/form-data">
  <input type="file" name="myFile" style="margin:10px 0;"/>
  <input type="submit" name="submit1" value="上传" accept=""/>
  <!-- accept:限制上传文件的类型-->
</form>
    <?php } else {?>
  <form method="post" action="thesisTopic.upload.php?submit=任务书& id=<?=$thesis_id?>" enctype="multipart/form-data">
    <input type="file" name="myFile" style="margin:10px 0;"/>
    <input type="submit" name="submit1" value="上传" accept=""/>
    <!-- accept:限制上传文件的类型-->
  </form>
    <?php } ?>
</div>

<?php include ('../students/footer.php');?>