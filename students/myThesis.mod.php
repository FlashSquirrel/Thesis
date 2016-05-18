
<?php 
   require_once('../include.php');
   connect();
   mysql_query("SET NAMES 'utf-8'");
   
   //session_start();
   $id = $_SESSION['id'];
   $type = $_GET['type'];
   

?>
<?php include ('header.php');?>
<p>
  重新上传<?php if($type=='thesis_report') echo "开题报告：";
               else if($type=='thesis_literature') echo "文献综述：";
               else if($type=='thesis_content') echo "论文正文：";
               else if($type =='thesis_translation') echo "外文翻译：";
               else if($type =='thesis_summary') echo "论文摘要：";
               else if($type == 'thesis_final') echo "论文终稿：";
               ?>
</p>
<div class="myThesis">
<form method="post" action="myThesis.mod.do.php?type=<?=$type?>" enctype="multipart/form-data">
  <input type="file" name="myFile"/><br/>
  <input type="submit" name="submit1" value="上传该文件" accept=""/>
  <!-- accept:限制上传文件的类型-->
</form>
</div>

<?php include ('footer.php');?>