<?php
  require_once '../include.php';
  connect();
  mysql_query("SET NAMES 'utf-8'");

error_reporting(E_ALL); //开启错误
set_time_limit(0); //脚本不超时
 
date_default_timezone_set('Europe/London'); //设置时间
 
/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . 'http://www.cnblogs.com/../Classes/');//设置环境变量
 
/** PHPExcel_IOFactory */
include '../PHPExcel/PHPExcel/IOFactory.php';
 
$inputFileType = 'Excel5';    //这个是读 xls的
    //$inputFileType = 'Excel2007';//这个是计xlsx的
//$inputFileName = './sampleData/example2.xls';
//要先把要导入的文件上传到工作的同一目录下然后才能用PHPExcel读入

    $filename = $_FILES['myFile']['name'];  //文件在客户端的名字
	$tmp_name=$_FILES['myFile']['tmp_name'];   //文件上传到服务器上的临时名
    if(empty($filename))
    {
        echo "<script>alert('请选择要导入的excel表格');window.location.href='addTeacher.php';</script>";
    }
	//将服务器上的临时文件移到指定目录下
   if(move_uploaded_file($tmp_name,iconv("UTF-8","gb2312","../uploads/".$filename)))
   {

        $inputFileName = "../uploads/".$filename;//文件上传到服务器后的地址
 
        //echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
      
        $objPHPExcel = $objReader->load($inputFileName);
      
        /*
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); //取得总行数
        $highestColumn = $sheet->getHighestColumn(); //取得总列
        */   
        $objWorksheet = $objPHPExcel->getActiveSheet();//取得总行数
        $highestRow = $objWorksheet->getHighestRow();//取得总列数
 
        //echo 'highestRow='.$highestRow;
        //echo "<br>";
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数
        //echo 'highestColumnIndex='.$highestColumnIndex;
       // echo "<br />";
        $headtitle=array();
        for($row = 1;$row < $highestRow;$row++)
        {
            $strs=array();
            //注意highestColumnIndex的列数索引从0开始
            for ($col = 0;$col < $highestColumnIndex;$col++)
            {
                $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
            $time=date("Y-m-d H:i:s");
            $created=$_SESSION['name'];
              $teacher = array(
                    'number'=>"'$strs[0]'",
                    'name'=>"'$strs[1]'",
                    'sex'=>"'$strs[2]'",
                    'institute'=>"'$strs[3]'",//学院
					'major'=>"'$strs[4]'",   //专业
          'position'=>"'$strs[5]'",//职称
          'birthday'=>"'$strs[6]'",//生日
          'political_status'=>"'$strs[7]'",//政治面貌
					'national'=>"'$strs[8]'",  //民族
          'email'=>"'$strs[9]'",//邮箱
					'phone'=>"'$strs[10]'",    //联系电话    
					'password'=>"'$strs[0]'",  //密码
                    'belong_to'=>"'teacher'",
                    'created'=>"'$time'",
                    'created_by'=>"'$created'",
              );
              //写入数据库
			  $query = insert('user',$teacher);
			  if(!$query)
                 echo "<script>alert('教师信息导入成功');window.location.href='teacher.php';</script>";
             else echo "<script>alert('教师信息导入失败');window.location.href='teacher.php';</script>";
        }
   }else echo "上传文件出错";
 
?>