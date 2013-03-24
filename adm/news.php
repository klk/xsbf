<?php
require_once('../inc.php');
require_once('islogin.php');

switch($act){
	case 'save':
		$oldact=$_POST['oldact'];
		$id=intval($_POST['id']);
		$title=$_POST['title'];
		$content=$_POST['content'];
		if($oldact=='edit'){
			$sql="update news set title='$title',content='$content',updatetime='$timestamp',uid='$uid' where id='$id'";
		}else{
			$sql="insert into news set title='$title',content='$content',createtime='$timestamp',updatetime='$timestamp',uid='$uid'";
		}
		if($db->query($sql)){ alert('保存成功！',"newslist.php");}
	break;

	case 'del':
		$id=intval($_POST['id']);
		$db->query("update news set updatetime='$timestamp',uid='$uid',status=0 where id='$id'");
		echo 'ok';exit;
	break;
	
	case 'edit':
		$id=intval($_GET['id']);
		$rs=$db->fetch_first("select * from news where id='$id'");
	break;
	
	default:
		//添加新闻
	break;
}

require_once('../inc/template.php');
include($template->getfile('adm/news'));
?>