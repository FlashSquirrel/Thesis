<?php 
     require_once'../include.php';
     connect();
     mysql_query("set names 'utf-8'");
     
  $students_id = $_GET['id'];
  $review = fetchAll("select work_attitude,advice,created from mid_term where student_id = '$students_id'");
?>
<?php include("header.php");?>
<style>
  .review{margin:0px 0 0 60px;}
  .review ul{margin-bottom:12px;}
  .review ul li{display:inline;padding-right:60px;height:20px; line-height:20px; font-size:16px;}
  form{height:70px;}
</style>
<div class="review">
   <?php if(!empty($review)){ ?>
	<ul><li>完成态度：<?php echo $review[0]['work_attitude'];?></li></ul>
	   <?php foreach($review as $result){ ?>
    <ul>
	    <li>以往评语：<?php echo $result['advice'];?></li>
		<li style="font-size:13px;"><?php echo $result['created'];?></li>
	</ul>
	<?php } ?>
	<br/>
<form method="post" action="review.do.php?id=<?=$students_id?>">
<input type="hidden" value="<?php echo $review[0]['work_attitude']?>" name="attitude"/>
  <ul>
    <li>
      <textarea rows="6" cols="60" name="advice"></textarea>
    </li>
	<br/>
     <li style="padding-left:60px;">
    <input type="submit" name="submit" value="追加评语"/>
    <input type="button" onclick="javascript:history.back(-1);" value="取消"/>
	</li>
</ul>
</form>
<?php } else {?>
<form method="post" action="review.do.php?id=<?=$students_id?>">
<ul>
    <li>
      <select name="attitude">
	      <option value="优">优</option>
		  <option value="良">良</option>
		  <option value="中">中</option>
		  <option value="差">差</option>
	  <select>
    </li>
</ul>
  <ul>
    <li>
      <textarea rows="6" cols="60" name="advice"></textarea>
    </li>
	<br/>
     <li style="padding-left:60px;">
    <input type="submit" name="submit" value="评论"/>
    <input type="button" onclick="javascript:history.back(-1);" value="取消"/>
	</li>
</ul>
<?php }?>
</form>
</div>


 <?php include ('footer.php');?>