<?php include ("header.php");?>
<?php
    require_once"../include.php";
    connect();
    mysql_query("set names 'utf-8'");
    
    $table = fetchAll("select * from total_table where type = 'form' order by upload_time DESC");
?>
<form method="post" action="form.upload.php" enctype="multipart/form-data">
  <input type="file" name="myFile"/>
  <input type="submit" name="submit1" value="上传该文件" accept=""/>
  <!-- accept:限制上传文件的类型-->
</form>
<div class="show">
  <style>table tr td{text-align:center;}</style>
  <table width="99%" margin="0" padding="0">
    <tr>
      <th>序号</th>
      <th>表格名</th>
      <th>状态</th>
      <th>上传时间</th>
      <th>操作</th>
    </tr>
    <?php
              if(!empty($table))
              {
              $i = 1;
              foreach($table as $result){?>
    <tr>
      <td>
        <?php echo $i;?>
      </td>
      <td>
        <?php echo $result["file_name"];?>
      </td>
      <td>
        <?php if($result["status"]==1) echo "可下载";else echo "已上传";?>
      </td>
      <td>
        <?php echo $result["upload_time"];?>
      </td>
      <script type="text/javascript">
        function myconfirm()
        {
        var r=confirm("确定删除吗？")
        if(r==true)
        {
        method = "post";
        action = "choose.php?id=" + $result['id'];
        submit();
        }
        }
      </script>
      <td>
        <a href="form.del.php?id=<?=$result['id'];?>"><input type="submit" name="submit" value="删除" onclick="javaScript:myconfirm(); return false;"/>
        </a>
      </td>
    </tr>
    <?php $i+=1; } }?>
  </table>
</div>
       
<?php include ("../students/footer.php");?>