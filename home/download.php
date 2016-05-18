<?php


$filename = $_GET['filename'];
$type = $_GET['type'];
if($type=='form')
    $file_dir = "../uploads/form/";
else if(($type=='thesis_report')||($type=='thesis_literature')||($type=='thesis_translation')||($type=='thesis_content')||($type=='thesis_summary')||($type=='thesis_final'))
    $file_dir = "../uploads/thesis/";
else if(($type=='应用型')||($type=='理论型')||($type=='创新型')) 
    $file_dir = "../uploads/teacher/";
    
    //检查文件是否存在  

if (!file_exists(iconv("UTF-8","gb2312",$file_dir.$filename))) {  
    echo "文件找不到";  
    exit ();  
} 
else 
{  
$file_name = rawurlencode($filename);
    //打开文件  
   // $file = fopen ( $file_dir . $filename, "r" );  
    //输入文件标签   



header("Content-type: text/plain; charset=utf-8");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition:inline;filename=" . $filename);
header("Content-Transfer-Encoding: binary");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: no-cache");
    //Header ( "Content-type: application/octet-stream" );  
   // Header ( "Accept-Ranges: bytes" );  
   // Header ( "Accept-Length: " . filesize ( $file_dir . $file_name ) );  
   // Header ( "Content-Disposition: attachment; filename=" . $file_name ); 
    ob_clean();  
  flush(); 
    //输出文件内容   
    //读取文件内容并直接输出到浏览器  
   // echo fread ( $file, filesize ( $file_dir . $filename ) );  
   readfile(iconv("UTF-8","gb2312",$file_dir.$filename));
   // fclose ( $file );  
    exit ();  
}   

?>