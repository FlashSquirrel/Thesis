<?php 
     require_once'../lib/mysql.func.php';
     connect();
     mysql_query("set names 'utf-8'");

if(isset($_POST['submit']))
{
	     $student_id = $_GET['id'];
	     $attitude = $_POST['attitude'];
		   $advice = $_POST['advice'];
       if(empty($advice))
       {
           echo "<script>alert('不能提交空内容');window.location.href='review.php?id=$student_id';</script>";
           exit();
       }

	     $time = date("Y-m-d H:i:s");

		   $mid = array('student_id'=>"'$id'",
		              'advice'=>"'$advice'",
					  'work_attitude'=>"'$attitude'",
					  'created'=>"'$time'",
					  );
	     $query = insert('mid_term',$mid);
      if($query)
          echo "<script>alert('评论成功');window.location.href='middleCheck.php';</script>";
       else echo "<script>alert('评论失败');window.location.href='middleCheck.php';</script>";
}
?>


