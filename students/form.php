﻿
<?php 
    require_once"../include.php";
    mysql_query("SET NAMES 'utf-8'");
    connect();
    
    $form = fetchAll("select * from total_table where type = 'form' order by upload_time DESC");
?>
<?php include ("header.php");?>
<style>table tr td{text-align:center;}</style>
	  <!--   右部分主题内容 -->
		<div class="notice">
			<div class="notice_body">								
			<table width="100%" border="0" margin="0" padding="0">
              <tr>
                <th>序号</th>
                <th>表格</th>
                <th>上传时间</th>
               <!--<th>状态</th>--> 
                <th>操作</th>
              </tr>
              <?php if(!empty($form))
              {
              $i=1;
                  foreach($form as $result){?>
			        <tr>
                   <td><?php echo $i;?></td>
                <td>
                    <?php echo $result["file_name"];?>
                </td>
                <td><?php echo $result['upload_time']?></td>
                <!--<th><?php if($result['status']==0) echo "未下载";
                          else if($result['status']==1) echo"已下载"; 
                          else if($result['status']==3) echo "已上传";
                     ?></th>-->
                   <td>
                     <a href="../home/download.php?filename=<?=$result["file_name"]?>&type=<?=$result['type']?>"><input type="submit" name="submit" value="下载"/></a>
                    <!-- <a href="form.do.php"><input type="submit" name="submit" value="上传"/></a>    -->
                   </td>
	            </tr>	
              <?php $i+=1; } }?>
			</table>	
		    </div>
       </div>
				<!--    右边主题部分结束 -->

<?php include ("footer.php");?>