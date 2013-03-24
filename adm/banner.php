<?php
require_once('../inc.php');
require_once('islogin.php');

switch($act){
	case 'save':
		$p=$_FILES['pic'];
		if($p['size']>0){
			$pext=fileext($p['name']);
			if(!in_array($pext,array('jpg','gif','png','jpeg'))){ alert('图片格式不正确！');}
			$path='upload/banner/'.date('Y').'/'.date('m').'/';
			if(!is_dir('../'.$path)){ @mkdir('../'.$path,0777,true);}
			$rand=$timestamp.'_'.rand(10000,99999);
			$path1=$path.$rand.'.'.$pext;
			$path2=$path.$rand.'_min.'.$pext;
			copy($p['tmp_name'],'../'.$path1);
			thumb_w($p['tmp_name'],'../'.$path2,200);
			$db->query("insert into banner set url='$path1',url_min='$path2'");
			location('banner.php');
		}else{ alert('请选择图片！');}
	break;

	case 'del':
		$id=intval($_GET['id']);
		$rs=$db->fetch_first("select url,url_min from banner where id='$id'");
		$u1='../'.$rs['url'];
		$u2='../'.$rs['url_min'];
		@unlink($u1); @unlink($u2);
		$db->query("delete from banner where id='$id'");
		location('banner.php');
	break;
	
	default:
		$i=0;
		$qy=$db->query("select id,url_min from banner order by id asc");
		while($rs=$db->fetch_array($qy)){
			$bannerList[$i]=$rs;
			$i++;
		}
	break;
}

require_once('../inc/template.php');
include($template->getfile('adm/banner'));
?>