<?php 
session_start();
//包含所有的路径
header("content-type:text/html;charset=utf-8");
define('ROOT',dirname(__FILE__));
set_include_path(get_include_path().PATH_SEPARATOR.ROOT.'\lib'.PATH_SEPARATOR.ROOT.'\core'.PATH_SEPARATOR.ROOT.'\configs'.PATH_SEPARATOR.ROOT.'\home'
.PATH_SEPARATOR.ROOT.'\students'.PATH_SEPARATOR.ROOT.'\teachers'.PATH_SEPARATOR.ROOT.'\administrator'.PATH_SEPARATOR.ROOT.'asistantor');
//configs
require_once 'config.php';

//lib
require_once 'mysql.func.php';


//home
require_once 'dologin.php';

?>