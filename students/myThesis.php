<?php include ('header.php');?>
<?php 
   require_once('../include.php');
   connect();
   mysql_query("SET NAMES 'utf-8'");
   
   //session_start();
   $id = $_SESSION['id'];
   
   $thesis = fetchAll("select * from total_table where upload_user_id = '$id'");
?>
<style>table tr td{text-align:center;}</style>

<table width="100%" border="0" margin="0" padding="0">
  <tr>
    <th>序号</th>
    <th>文件</th>
    <th>上传时间</th>
    <th>状态</th>
    <th>操作</th>
  </tr>

  <?php 
    for($i=0;$i<=count($thesis);$i++)
    {
         if(!empty($thesis))
         {
             if($thesis[$i]['type']=='thesis_report')
                 $thesis_report = $thesis[$i];
              else if($thesis[$i]['type']=='thesis_literature')
                 $thesis_literature = $thesis[$i];
              else if($thesis[$i]['type']=='thesis_content')
                 $thesis_content = $thesis[$i];
              else if($thesis[$i]['type']=='thesis_translation')
                 $thesis_translation = $thesis[$i];
              else if($thesis[$i]['type']=='thesis_summary')
                 $thesis_summary = $thesis[$i];
              else if($thesis[$i]['type']=='thesis_final')
                 $thesis_final = $thesis[$i];
         }
     }    
    ?>
  
  
  <tr>
    <td>1</td>
    <td>开题报告</td>
    <?php 
         if(!empty($thesis_report)){
    ?>
    <td><?php echo $thesis_report['upload_time'];?></td>
    <td><?php echo '已上传';?></td>
    <td>
      <a href="myThesis.mod.php?type=<?='thesis_report'?>"/>
         <input type="submit" value="重新上传"/>
      </a>
    </td>
    <?php
     }else{?>
    <td><?php echo "";?></td>
    <td><?php echo '未上传';?></td>
    <td>
      <a href="myThesis.do.php?type=<?='thesis_report'?>"/>
          <input type="submit" value="点击上传"/>
      </a>
    </td>
    <?php }?>
  </tr>
  <tr>
    <td>2</td>
    <td>文献综述</td>
    <?php
           if(!empty($thesis_literature)){
    ?>
    <td>
      <?php echo $thesis_literature['upload_time'];?>
    </td>
    <td>
      <?php echo '已上传';?>
    </td>
    <td>
      <a href="myThesis.mod.php?type=<?='thesis_literature'?>"/>
          <input type="submit" value="重新上传"/>
      </a>
    </td>
    <?php }else{?>
    <td>
      <?php echo "";?>
    </td>
    <td>
      <?php echo '未上传';?>
    </td>
    <td>
      <a href="myThesis.do.php?type=<?='thesis_literature'?>"/>
      <input type="submit" value="点击上传"/>
      </a>
    </td>
    <?php }?>
  </tr>
  <tr>
    <td>3</td>
    <td>正文内容</td>
    <?php 
    if(!empty($thesis_content)){?>
    <td>
      <?php echo $thesis_content['upload_time'];?>
    </td>
    <td>
      <?php echo '已上传';?>
    </td>
    <td>
      <a href="myThesis.mod.php?type=<?='thesis_content'?>"/>
      <input type="submit" value="重新上传"/>
      </a>
    </td>
    <?php }else{?>
    <td>
      <?php echo "";?>
    </td>
    <td>
      <?php echo '未上传';?>
    </td>
    <td>
      <a href="myThesis.do.php?type=<?='thesis_content'?>"/>
      <input type="submit" value="点击上传"/>
      </a>
    </td>
    <?php }?>
  </tr>
  <tr>
    <td>4</td>
    <td>外文翻译</td>
    <?php 
    if(!empty($thesis_translation)){?>
    <td>
      <?php echo $thesis_translation['upload_time'];?>
    </td>
    <td>
      <?php echo '已上传';?>
    </td>
    <td>
      <a href="myThesis.mod.php?type=<?='thesis_translation'?>"/>
      <input type="submit" value="重新上传"/>
      </a>
    </td>
    <?php 
    }else{?>
    <td>
      <?php echo "";?>
    </td>
    <td>
      <?php echo '未上传';?>
    </td>
    <td>
      <a href="myThesis.do.php?type=<?='thesis_translation'?>"/>
      <input type="submit" value="点击上传"/>
      </a>
    </td>
    <?php }?>
  </tr>
  <tr>
    <td>5</td>
    <td>论文摘要</td>
    <?php 
    if(!empty($thesis_summary)){?>
    <td>
      <?php echo $thesis_summary['upload_time'];?>
    </td>
    <td>
      <?php echo '已上传';?>
    </td>
    <td>
      <a href="myThesis.mod.php?type=<?='thesis_summary'?>"/>
        <input type="submit" value="重新上传"/>
      </a>
    </td>
    <?php }else{?>
    <td>
      <?php echo "";?>
    </td>
    <td>
      <?php echo '未上传';?>
    </td>
    <td>
      <a href="myThesis.do.php?type=<?='thesis_summary'?>"/>
        <input type="submit" value="点击上传"/>
      </a>
      <?php }?>
    </td>
  </tr>
  <tr>
    <td>6</td>
    <td>论文终稿</td>
    <?php 
    if(!empty($thesis_final)){?>
    <td>
      <?php echo $thesis_final['upload_time'];?>
    </td>
    <td>
      <?php echo '已上传';?>
    </td>
    <td>
      <a href="myThesis.mod.php?type=<?='thesis_final'?>"/>
      <input type="submit" value="重新上传"/>
      </a>
    </td>
    <?php }else{?>
    <td>
      <?php echo "";?>
    </td>
    <td>
      <?php echo '未上传';?>
    </td>
    <td>
      <a href="myThesis.do.php?type=<?='thesis_final'?>"/>
      <input type="submit" value="点击上传"/>
      </a>
      <?php }?>     
    </td>
  </tr>

</table>

<?php include ('footer.php');