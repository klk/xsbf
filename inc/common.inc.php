<?php
error_reporting(0);
if(!defined('CURSCRIPT')){ exit('Access Denied');}
define('IN_PINMIX', TRUE);
define('PINMIX_ROOT', substr(dirname(__FILE__), 0, -4));

require_once(PINMIX_ROOT.'./config.inc.php');
require_once(PINMIX_ROOT.'./inc/global.func.php');

//安全性
if (isset($_REQUEST['GLOBALS']) || isset($_FILES['GLOBALS'])) { exit('Request tainting attempted.');}
$magic_quotes_gpc = get_magic_quotes_gpc();
if(!$magic_quotes_gpc){
	$_POST	= daddslashes($_POST); 
	$_GET	= daddslashes($_GET);
	$_FILES = daddslashes($_FILES);
}
if(!empty($_SERVER['REQUEST_URI'])) {
	$temp = urldecode($_SERVER['REQUEST_URI']);
	if(strpos($temp, '<') !== false || strpos($temp, '"') !== false || strpos($temp, "'") !== false){ exit('Request Bad Url');}
}
//连接数据库
require_once(PINMIX_ROOT.'./inc/db.class.php');
$db = new DBclass;
$db->connect($dbHost, $dbUser, $dbPass, $dbName, $pConnect, $dbcharset);
$dbUser = $dbPass = $pConnect = NULL;
//其他
if(function_exists('date_default_timezone_set')){ date_default_timezone_set('Asia/Shanghai');}//时区
$timestamp = time(); //时间戳
$nowurl    = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; //当前URL
$ecurl     = urlencode($nowurl);//URL编码
$clientip  = $_SERVER['REMOTE_ADDR'] ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';//ip地址
$nowfname  = substr(basename($_SERVER['PHP_SELF']),0,-4); //当前文件名
$act       = empty($_POST['act']) ? $_GET['act'] : $_POST['act']; //action操作判断
$referer   = $_SERVER['HTTP_REFERER'];//引用页
$secondDir = str_replace($site,'',$nowurl);//二级目录
$pos = strpos($secondDir,'/');
if($pos>0){ $secondDir=explode('/',$secondDir); $secondDir=$secondDir[0];}else{ $secondDir='';}

//用户登录
list($uid,$uadmin) = explode("\t",get_cookie('user'));

?>