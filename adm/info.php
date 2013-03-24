<?php
require_once('../inc.php');
require_once('islogin.php');

if($act=='save'){
	$id=$_POST['id'];
	$content=$_POST['content'];
	$db->query("update info set content='$content',updatetime='$timestamp',uid='$uid' where id='$id'");
	alert('保存成功！',"info.php?id={$id}");
}


$id=intval($_GET['id']);
$rs=$db->fetch_first("select id,title,content from info where id='$id'");

require_once('../inc/template.php');
include($template->getfile('adm/info'));
?>