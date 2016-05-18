<?php
    require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
	$comments = fetchAll("select * from comments ");

?>

<?php include ("header.php");?>

        <table style="width:99%;margin:0px;padding:0px;">
			  <?php 
        if(!empty($comments))
        foreach($comments as $result){ ?>
							<tr>
								<th><?php echo "评论者姓名"; ?></th>
								<th><?php echo 评论时间";?></th>
						  	<th colspan="2"><?php echo "评论内容"; ?></th>
							</tr>
							<?php }?>
			  </table>

<?php include ("../students/footer.php");?>