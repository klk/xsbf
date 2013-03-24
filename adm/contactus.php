<?php
require_once('../inc.php');
require_once('islogin.php');

if($act=='save'){
	$content=$_POST['content'];
	$db->query("update contact set content='$content',updatetime='$timestamp',uid='$uid' where id=1");
	alert('保存成功！',"contactus.php");
}

$rs=$db->fetch_first("select content from contact where id=1");

require_once('../inc/template.php');
include($template->getfile('adm/contactus'));
?>