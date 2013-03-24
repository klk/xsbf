<?php
require_once('inc.php');
require_once('inc/page.class.php');
require_once("head.php");

$cid1=intval($_GET['cid1']);
$cid2=intval($_GET['cid2']);
$keyword=trim($_GET['keyword']);
if($cid1){ $cid1name=$db->result_first("select name from proclass where id='$cid1'");}
if($cid1name){ $n=$cid1name;}else{ $n='产品展示';}
$sql="select * from product ";
if($cid1 && !$cid2){ $sql.="where cid1='$cid1'";}
if($cid1 && $cid2){ $sql.="where cid1='$cid1' and cid2='$cid2'";}
if($keyword){ $sql="select * from product where title like '%$keyword%'"; $n='产品搜索';}
$sql.=" order by id desc limit 20";

$page = new Page($sql);
$sql=$page->StartPage();
$qy = $db->query($sql);
$i=0;
while($rs=$db->fetch_array($qy)){
	$prolist[$i]=$rs;
	$titleall=$prolist[$i]['title'];
	$title=cutstr($prolist[$i]['title'],40);
	$prolist[$i]['title']=$title;
	$i++;
}
$endpage=$page->EndPage(2,3);


//产品分类
$i=0;
$qy=$db->query("select id,name from proclass where pid=0 and status=1 order by id asc");
while($rs=$db->fetch_array($qy)){
	$nav_proclass1[$i]=$rs;
	$j=0;
	$qy2=$db->query("select id,name from proclass where pid='{$rs['id']}' and status=1 order by id asc");
	while($rs2=$db->fetch_array($qy2)){
		$nav_proclass2[$i][$j]=$rs2;
		$j++;
	}
	$i++;
}

$siteTitle=$n.'_'.$siteTitle;
require_once('inc/template.php');
include($template->getfile('prolist'));
?>