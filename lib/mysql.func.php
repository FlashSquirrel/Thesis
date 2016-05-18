<?php
 require_once '../configs/config.php';
	/**
	*链接数据库
	*
	**/
    function connect()
    {
      //连库
	    if(!($con = mysql_connect(HOST, USERNAME,PASSWORD))){
	       echo "数据库链接失败".mysql_error();
	    }
	    //选库（打开数据库）
	    if(!(mysql_select_db('manage'))){
	        echo mysql_error();
	     }
	    //字符集
	    if(mysql_query('set names utf8')){
	          echo mysql_error();
	     }
    }
     
  
	/**
	*记录插入
	*
 	**/
function insert($table,$array,$echosql=0)
{
  $value = implode(',',$array);//将array以','为界分成数组
  //将数组成员的键组合成一个数组返回
  $keys = array_keys($array);
  $key = implode(',',$keys);

  //foreach($value as $val)
  //{
   //   if(!is_string($value)==true)
     //     $values[] = "'".$value."'";
  //}
   $sql="INSERT INTO $table ($key) VALUES ($value)"; 
   //调试sql语句错误,
   if($echosql){die($sql);}
   $result=mysql_query($sql);
   if(!$result)
  {
     echo '<pre>'; 
     die(mysql_error());
     echo '</pre>';
  }
  //返回刚刚插入的id 
  return mysql_insert_id();

   // 更新或删除语句是返回更新或删除的条数
    mysql_affected_rows();   
}


	/**
	*记录更新
	*
	**/
  // $res=update($array, $table,'id=3');
	function update($table,$array,$where=null)
	{
	   foreach($array as $key=>$val)
		{
		    if($str==null){
			    $sep="";
			}else{
			    $sep=",";
			}
			$str[]=$sep.$key."='".$val."'";
		}
    print_r($str);
		$sql="update {$table} set {$str} ".($where==null?null:"where ".$where);
    print_r($sql);
		$result=mysql_query($sql);
   if(!$result)
  {
     echo '<pre>'; 
     die(mysql_error());
     echo '</pre>';
  }
		return mysql_affected_rows();
	}
  
	/**
	*记录删除
	*
	**/
	function delete($table,$where)
	{
	 // $where=($where=null?null:"where"."$where");
		//$sql="delete from {$table} where {$where}";
    $sql = "delete from ".$table." where ".$where;
		mysql_query($sql);
		return mysql_affected_rows();
	}
	/**
	*查找一条数据
	*
	**/
	function fetchOne($sql,$result_type=MYSQL_ASSOC)
	{
	    $result=mysql_query($sql);
		while(@$row=mysql_fetch_array($result,$result_type))
		{
		    $rows[]=$row;
		}
		return $rows;
	}
	/**
	*查找所有数据
	*
	**/
	function fetchAll($sql,$result_type=MYSQL_ASSOC)
	{
	  $result=mysql_query($sql);
		while(@$row=mysql_fetch_array($result,$result_type))
		{
		    $rows[]=$row;
		}
		return $rows;
	}

	/**
	*结果集中的记录条数
	*
	**/
	function getResultNum($sql)
	{
	    $result=mysql_query($sql);
		return mysql_num_rows($result);
	}

  
?>