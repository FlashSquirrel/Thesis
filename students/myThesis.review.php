<?php 
   require_once('../include.php');
   connect();
   mysql_query("SET NAMES 'utf-8'");
   
   $id = $_SESSION['id'];
   $review = fetchAll("select advice,work_attitude,mid_term.created,thesis_title.title from mid_term,thesis_title,student_choose_thesis_title where mid_term.student_id='$id'
   and student_choose_thesis_title.student_id='$id' and thesis_title.id=student_choose_thesis_title.thesis_title_id");
print_r($review);
?>
<?php include ('header.php');?>

<style>
  .review{padding:10px 0 0 60px; font-size:16px;}
  .review ul li{display:inline;height:30px;line-height:30px;padding-right:60px;}
</style>
<div class="review">
  <?php if(!empty($review)){?>
  <ul>
   
    <li>
      论文题目：<?php echo $review[0]['title'];?>
    </li>
  </ul>
  <ul>
   
    <li style="align:top;">
      态度评分：<?php echo $review[0]['work_attitude'];?>
    </li>
  </ul>
  <ul>
    <?php foreach($review as $result){ ?>
    <li>
      老师建议：<?php echo $result['advice'];?>
    </li>
    <li>
      <?php echo $result['created'];?>
    </li>
    <br/>
    <?php }?>
  </ul>
  <?php }?>
</div>

<?php include ('footer.php');