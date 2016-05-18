<?php include("header.php");?>
<?php
    require_once'../include.php';
    connect();
    mysql_query("SET NAMES 'utf-8'");
    $thesis = fetchAll('select title from thesis_title where status = "1"');//对可选论文进行查询
    $major = fetchAll('select major_name from major');//查询了全部的专业
    $class = fetchAll('select class_name from class order by major_id desc');
    $student = fetchAll('select name from user where belong_to = "student" order by class_id desc');//查询了所有的学生
?>
<script language = "JavaScript">
  var onecount2;
  subcat2 = new Array();
  <?php $num2 = count($class);?>
  onecount2=<?echo $num2;?>;
  <?php for($j=0;$j<$num2;$j++) {?>
    subcat2[<?echo $j;?>] = new Array("<?echo $class[$j]['id'];?>","<?echo $class[$j]['major_id'];?>","<?echo $class[$j]['class_name'];?>");
   <?php }?>
    function changelocation(id)
    {
        document.myform.class.length = 0;
         var id=id;
         var j;
    document.myform.class.options[0] = new Option('==选择班级==','');
    for (j=0;j < onecount2; j++) 
    { 
        if (subcat2[j][1] == id) 
        { 
            document.myform.class.options[document.myform.class.length] = new Option(subcat2[j][2], subcat2[j][0]); 
         } 
    } 
}
</script>

<form method="post" action="distribute.do.php">
<div class="left" style="margin-left:200px;">
      专业：<select name="major">
	        <option>选择学生所属专业</option>
        <?php foreach($major as $result){?>
        <option>
          <?php echo $result["major_name"];?>
        </option>
        <?php } ?>
			</select>

	  	班级：<select name="class">
  <?php $class = fetchAll('select class_name from class');//查询了全部的班级名称?>
  <option>选择学生所在班级</option>
  <?php foreach($class as $result){?>
  <option>
    <?php echo $result["class_name"];?>
  </option>
  <?php } ?>
</select>
        
		学生：<select name="student">
	        <option>选择一名学生</option>
      <?php foreach($student as $result){?>
      <option>
        <?php echo $result["name"];?>
      </option>
      <?php } ?>
    </select><br/>
  <div style="padding-top:10px;">
    选择论文题目：<select name="thesis">
      <option>选择论题</option>
      <?php foreach($thesis as $result){?>
      <option>
        <?php echo $result["title"];?>
      </option>
      <?php } ?>
    </select>
  </div>
</div>

<div style="padding:10px 0px 0px 320px;">
  <input type="submit" value="提交"/>
  <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
</div>
</form>

<?php include("../students/footer.php");?>