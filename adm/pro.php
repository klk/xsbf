<?php
require_once('../inc.php');
require_once('islogin.php');

switch($act){
	case 'save':
		$p=$_FILES['pic'];
		$title=trim($_POST['title']);
		if(!$title){ alert('请填写产品名称！');}
		if($p['size']>0){
			$pext=fileext($p['name']);
			if(!in_array($pext,array('jpg','gif','jpeg','png'))){ alert('产品形象图格式不正确！');}
			$path='upload/pic/'.date('Y').'/'.date('m').'/';
			if(!is_dir('../'.$path)){ @mkdir('../'.$path,0777,true);}
			$rand=$timestamp.'_'.rand(10000,99999);
			$path.=$rand.'.'.$pext;
			copy($p['tmp_name'],'../'.$path);
		}else{ $path='';}
		$oldact=$_POST['oldact'];
		$id=intval($_POST['id']);
		$cid1=$_POST['cid1'];
		$cid2=$_POST['cid2'];
		$content=$_POST['content'];
		if($path){ $sql=",pic='$path'";}else{ $sql='';}
		if($oldact=='edit'){
			$sql="update product set cid1='$cid1',cid2='$cid2',title='$title',content='$content'{$sql} where id='$id'";
		}else{
			$sql="insert into product set cid1='$cid1',cid2='$cid2',title='$title',content='$content'{$sql},createtime='$timestamp'";
		}
		if($db->query($sql)){ alert('保存成功！',"prolist.php?cid1={$cid1}&cid2={$cid2}");}
	break;

	case 'del':
		$id=intval($_GET['id']);
		$db->query("update product set status=0 where id='$id'");
		location($referer);
	break;

	case 'edit':
		$id=intval($_GET['id']);
		$rs=$db->fetch_first("select * from product where id='$id'");
		$cid1=$rs['cid1'];
		$cid2=$rs['cid2'];
		$cname1=$db->result_first("select name from proclass where id='$cid1'");
		$i=0;
		$qy=$db->query("select id,name from proclass where pid='{$cid1}' order by id asc");
		while($prs=$db->fetch_array($qy)){
			$proclass2[$i]=$prs;
			$i++;
		}
	break;

	default:
		$cid1=intval($_GET['cid1']);
		$cid2=intval($_GET['cid2']);
		$cname1=$db->result_first("select name from proclass where id='$cid1'");
		$i=0;
		$qy=$db->query("select id,name from proclass where pid='{$cid1}' order by id asc");
		while($prs=$db->fetch_array($qy)){
			$proclass2[$i]=$prs;
			$i++;
		}
	break;
}

require_once('../inc/template.php');
include($template->getfile('adm/pro'));
?>