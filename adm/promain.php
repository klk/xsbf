<?php
require_once('../inc.php');
require_once('islogin.php');

switch($act){
	//产品类型
	case 'savepc1':
		$id=intval($_POST['id']);
		$name=trim($_POST['name']);
		if($id==0){ $sql="insert into proclass set name='$name'";}
		else{ $sql="update proclass set name='$name' where id='$id'";}
		$db->query($sql);
		echo 'ok';exit;
	break;
	//产品型号
	case 'savepc2':
		$id=intval($_POST['id']);
		$pid=intval($_POST['pid']);
		$name=trim($_POST['name']);
		if($id==0){ $sql="insert into proclass set name='$name',pid='$pid'";}
		else{ $sql="update proclass set name='$name',pid='$pid' where id='$id'";}
		$db->query($sql);
		echo 'ok';exit;
	break;
	//删除类型或型号
	case 'del':
		$id=intval($_GET['id']);
		$db->query("update proclass set status=0 where id='$id'");
		alert('删除成功！','promain.php');
	break;

	default:
		//产品分类
		$i=0;
		$qy=$db->query("select id,name from proclass where pid=0 and status=1 order by id asc");
		while($rs=$db->fetch_array($qy)){
			$proclass1[$i]=$rs;
			$j=0;
			$qy2=$db->query("select id,name from proclass where pid='{$rs['id']}' and status=1 order by id asc");
			while($rs2=$db->fetch_array($qy2)){
				$proclass2[$i][$j]=$rs2;
				$j++;
			}
			$i++;
		}
	break;
}
	
require_once('../inc/template.php');
include($template->getfile('adm/promain'));
?>