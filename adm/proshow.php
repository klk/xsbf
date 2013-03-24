<?php
require_once('../inc.php');
require_once('islogin.php');

switch($act){
	case 'savespec':
		$p=$_FILES['spec'];
		$pid=intval($_POST['pid']);
		if($p['size']>0){
			$pext=fileext($p['name']);
			if($pext!='pdf'){ alert('样本格式不正确！');}
			$path='upload/spec/'.date('Y').'/'.date('m').'/'.date('d').'/';
			if(!is_dir('../'.$path)){ @mkdir('../'.$path,0777,true);}	
			if(file_exists('../'.$path.$p['name'])){ alert('上传失败！文件名有重复！',"proshow.php?id={$pid}");}
			$path.=$p['name'];
			copy($p['tmp_name'],'../'.$path);
		}else{ $path='';}
		if($path){ $sql=",url='$path'";}else{ $sql='';}
		$title=$p['name'];
		$sql="insert into spec set pid='$pid',title='$title'{$sql}";
		if($db->query($sql)){ alert('保存成功！',"proshow.php?id={$pid}");}
	break;

	case 'del':
		$id=intval($_GET['id']);
		$url=$db->result_first("select url from spec where id='$id'");
		if(file_exists('../'.$url)){ @unlink('../'.$url);}
		$db->query("delete from spec where id='$id'");
		location($referer);
	break;

	default:
		$id=intval($_GET['id']);
		$rs=$db->fetch_first("select * from product where id='$id' and status=1");
		$title=$rs['title'];
		$content=$rs['content'];
		$createtime=date('Y-m-d',$rs['createtime']);
		$cid1=$rs['cid1'];
		$cid2=$rs['cid2'];
		$cname1=$db->result_first("select name from proclass where id='$cid1'");
		$cname2=$db->result_first("select name from proclass where id='$cid2'");
		//样本
		$i=1;
		$qy=$db->query("select id,title,url from spec where pid='{$id}' order by id asc");
		while($prs=$db->fetch_array($qy)){
			$specList[$i]=$prs;
			$i++;
		}
	break;
}

require_once('../inc/template.php');
include($template->getfile('adm/proshow'));
?>