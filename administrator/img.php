<?php
    require_once '../include.php';
	connect();
	mysql_query("SET NAMES 'utf-8'");
  
  $img = fetchAll("select * from total_table where type = 'img'");
    
?>
<?php include('header.php');?>

<a href="img.do.php"><input type="submit" name="submit" value="添加图片"/></a>
<style>table tr td{text-align:center;}</style>
    <table width="99%" margin="0" padding="0">
	    <tr>
		    <th>序号</th>
			  <th>图片</th>
        <th>操作</th>
		</tr>
      <?php if(!empty($img))
      {
      $i =1;
                 foreach($img as $result){?>
      <tr>
        
        <td><?php echo $i;?></td>
        <td><?php echo $result['file_name']?></td>
        <td>
          <a href="img.mod.php?id=<?=$result['id']?>">修改</a></td>
        
      </tr>
      <?php $i+=1; } }?>
	</table>

<?php include('../students/footer.php');?>