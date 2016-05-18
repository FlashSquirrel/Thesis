<?php
    require_once ('../include.php');
	connect();
	mysql_query("SET NAMES 'UTF-8'");

   $thesis = fetchAll("select * from total_table where type = 'thesis_final'");
?>
<?php include ('header.php');?>

<style>table tr td{text-align:center;}</style>

    <table width="99%" margin="0px" padding="0px">
	    <tr>
		    <th>序号</th>
			<th>论文题目</th>
        <th>上传时间</th>
			<th>已上传数量</th>
		</tr>
		<tr>
      <?php if(!empty($thesis))
      {
      $i=1;
               foreach($thesis as $result){
      ?>
		  <td><?php echo $i;?></td>
      <td>
        <?php echo $result['file_name'];?>
      </td>
      <td>
        <?php echo $result['upload_time'];?>
      </td>
      <td>
        <?php
            $filename = $result['file_name'];
            $final_id = $result['id'];
            $num = getResultNum("select count(*) from total_table where type = 'thesis_final' and file_name = '$filename' and id = '$final_id'");
            echo $num;
        ?>
      </td>
      <?php $i+=1; } }?>
		</tr>
	</table>


<?php include ('../students/footer.php');?>