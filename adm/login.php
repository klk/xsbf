<?php
session_start();
require_once('../inc.php');

switch($act){
	//登出
	case 'exit':
		clear_cookie('user');
		location("{$site}adm/login.php");
	break;
	//登录
	case 'login':
		$u=trim($_POST['u']);
		$p=md5($_POST['p']);
		$yzm=strtolower(trim($_POST['yzm']));
		if($yzm!=strtolower($_SESSION['vercode'])){ echo 'yzm';exit;}
		$rs=$db->fetch_first("select id,is_admin from user where username='$u' and password='$p'");
		if($rs['id']>0){
			$uid   = $rs['id'];
			$uadmin= $rs['is_admin'];
			$db->query("update user set login_time='$timestamp',login_ip='$clientip',login_num=login_num+1 where id='$uid'");
			cookie('user',$uid."\t".$uadmin);
			echo 'ok'; exit;
		}else{ echo 'u_p';exit;}
	break;
}

$siteTitle = "管理登录_".$siteTitle;

require_once('../inc/template.php');
include($template->getfile('adm/login'));
?>