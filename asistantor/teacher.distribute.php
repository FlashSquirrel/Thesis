<?php include 'header.php';?>
<?php 
   require_once ('../include.php');
   connect();
   mysql_query("set names 'utf-8'");
   
    $teacher = fetchAll("select * from user where belong_to='teacher'");
?>

<script language = "JavaScript">
  var onecount;
  onecount=0;
  subcat = new Array();
  <?php

   $sql = "select * from class";
   $result = mysql_query( $sql );
   $count = 0;
   while($res = mysql_fetch_array($result)){
  ?>
   subcat[<?=$count?>] = new Array("<?=$res[id]?>","<?=$res[class_name]?>","<?=$res[major_id]?>");
  <?php
   $count++;
    }
    echo "onecount=$count;";
   ?>
//联动函数
function changelocation(locationid)
   {
   document.myform.ctype.length = 0; 
   var locationid=locationid;
   var i;
   for (i=0;i < onecount; i++)
       {
           if (subcat[i][2] == locationid)
           { 
      //var newOption1=new Option(subcat[i][1], subcat[i][0]);
               //document.all.ctype.add(newOption1);
               document.myform.ctype.options[document.myform.ctype.length] = new Option(subcat[i][1], subcat[i][0]);
           }        
       }
       
   }  
   
   var onecounts;
  onecounst=0;
  subcats = new Array();
   <?php
   $results = mysql_query( "select * from user where belong_to = 'student'" );
   $counts = 0;
   while($resu = mysql_fetch_array($results)){
  ?>
   subcats[<?=$counts?>] = new Array("<?=$resu[id]?>","<?=$resu[name]?>","<?=$resu[class_id]?>");
   <?php
   $counts++;
    }
    echo "onecounts=$counts;";
   ?>
function changelocation2(locationid)
   {
   document.myform.dtype.length = 0; 
   var locationid=locationid;
   var j;
   for (j=0;j < onecounts; j++)
       {
           if (subcats[j][2] == locationid)
           { 
      //var newOption1=new Option(subcat[i][1], subcat[i][0]);
               //document.all.dtype.add(newOption1);
               document.myform.dtype.options[document.myform.dtype.length] = new Option(subcats[j][1], subcats[j][0]);
           }        
       }
       
   }
</script>
<form method="post" name="myform" action="teacher.distribute.do.php">
  <div class="left" style="margin:7% 0 0 200px;">
    
    专业：<select name="type" onChange="changelocation(document.myform.type.options[document.myform.type.selectedIndex].value)" size="1">
      <option selected="" value="">请选择专业</option>
      <?php
     $result =  fetchAll("select * from major");
     if(!empty($result))
     foreach($result as $res){
    ?>
      <option value="<?php echo $res[id];?>">
        <?php echo $res[major_name]; ?>
      </option>
      <?php } ?>
    </select>

    班级：<select name="ctype" onChange="changelocation2(document.myform.ctype.options[document.myform.ctype.selectedIndex].value)" size="1">
      <option selected="" value="">请选择班级</option>
    </select>
    学生：<select name="dtype">
      <option selected="" value="">请选择学生</option>
    </select><br/>
    
    <div style="padding-top:10px;">
      选择老师：<select name="teacher">
        <option>选择老师</option>
        <?php
        if(!empty($teacher))
        foreach($thesis as $result){?>
        <option value="<?php echo $result['id'];?>">
          <?php echo $result["title"];?>
        </option>
        <?php } ?>
      </select>
    </div>
    
  </div>
  <div style="padding:10px 0px 0px 320px;">
    <input type="submit" name="submit" value="提交"/>
    <input type="button" name="submit2" onclick="javascript:history.back(-1);" value="取消"/>
  </div>
</form>

  <?php include '../students/footer.php';?>