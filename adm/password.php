<?php
require_once('../inc.php');
require_once('islogin.php');

if($act=='save'){
	$oldpwd=md5(trim($_POST['oldpwd']));
	$newpwd=md5(trim($_POST['newpwd']));
	$pwd=$db->result_first("select password from user where id=1");
	if($oldpwd!=$pwd){ echo 'pwd'; exit;}else{
		$db->query("update user set password='$newpwd' where id=1");
		echo 'ok'; exit;
	}
}

require_once('../inc/template.php');
include($template->getfile('adm/password'));
?>