<?php include ("header.php");?>
<?php
  require_once"../include.php";
  connect();
  mysql_query("SET NAMES 'utf-8'");
  $key = $_GET['key'];
  $thesis_title = fetchAll("select * from thesis_title where title like '%$key%' or teacher_id like '$key' order by created DESC");
?>

    <div style="float:right;padding:5px 20px 5px;">
      <form method="get" action="thesisTopic.search.php">
	    <input type="text" name="key"/>
		<input type="submit" value="搜索"/>
      </form>
	</div>

<style>table tr td{text-align:center;}</style>
	<table width="99%" border="0" cellspacing="0" cellpadding="0">
                            <div class="one">
                            <tr>
                                <th>序号</th>
                                <th>导师</th>
                                <th>论题</th>
                                <th>创建时间</th>
								<th>修改时间</th>
								<th>状态</th>
								<th>操作</th>
								<th>评论</th>
                            </tr>
                            </div>
							<?php 
              if(!empty($thesis_title))
              {
              $i=1;
              foreach($thesis_title as $result){ ?>
    <tr>
      <td>
        <?php echo $i;?>
      </td>
      <td>
        <?php echo $result["teacher_id"];?>
      </td>
      <td>
        <?php echo $result["title"];?>
      </td>
      <td>
        <?php echo $result["created"];?>
      </td>
      <td>
        <?php echo $result["modified"];?>
      </td>
      <td>
        <?php if($result['status']=='1')echo "通过审核";
                            else if($result['status']=='2') echo "未通过审核";
                            else if($result['status']=='0') echo "未审核";
                            ?>
      </td>
      <td>
        <?php if(!empty($result['create_ask_table'])){?>
        <a href="../home/download.php?filename=<?=$result["create_ask_table"]?>&type=<?=$result['type']?>">
                <input type="submit" value="申报表"/>
        </a>
        <?php }else echo "未上传";?>
        <br/>
        <?php if(!empty($result['create_task_book'])){?>
        <a href="../home/download.php?filename=<?=$result["create_task_book"]?>&type=<?=$result['type']?>">
             <input type="submit" value="任务书"/>
        </a>
        <?php }else echo "未上传";?>
      </td>
      <td>
        <a href="check.php?id=<?=$result['id']?>">
          <input type="submit" value="审核"/>
        </a>
      </td>
    </tr>
							<?php $i+=1; } }?>
	</table>
<?php include ("../students/footer.php");?>