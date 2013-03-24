<?php
require_once('inc.php');
require_once("head.php");

//banner切换
$i=0;
$qy=$db->query("select id,url from banner order by id asc limit 5");
while($rs=$db->fetch_array($qy)){
	$bannerlist[$i]=$rs;
	$i++;
}

//banner右侧
$i=0;
$qy=$db->query("select id,title from article where status=1 order by id asc limit 6");
while($rs=$db->fetch_array($qy)){
	$artlist[$i]=$rs;
	$i++;
}

//了解京东方
$aboutus=$db->result_first("select content from info where id=1");
$aboutus=cutstr(strip_tags($aboutus),340);

//右侧4条新闻
$i=0;
$qy=$db->query("select id,title from news where status=1 order by createtime desc limit 8");
while($rs=$db->fetch_array($qy)){
	$news[$i]=$rs;
	$news[$i]['title']=cutstr($rs['title'],60);
	$i++;
}
//文章列表
$i=0;
$qy=$db->query("select id,title from article where status=1 order by id asc limit 6");
while($rs=$db->fetch_array($qy)){
	$artlist[$i]=$rs;
	$i++;
}

//产品展示
$i=0;
$qy=$db->query("select * from product order by createtime limit 15");
while($rs=$db->fetch_array($qy)){
	$prolist[$i]=$rs;
	$titleall=$prolist[$i]['title'];
	$title=cutstr($prolist[$i]['title'],15);
	$prolist[$i]['title']=$title;
	$i++;
	//$cname1=$db->result_first("select name from proclass where id='$cid1'");
	//$cname2=$db->result_first("select name from proclass where id='$cid2'");
}


$description="";

require_once("left.php");

require_once('inc/template.php');
include($template->getfile('index'));
?>