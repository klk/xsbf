<?php
require_once('inc.php');
require_once('inc/page.class.php');
require_once("head.php");

$sql="select * from article where status=1 order by id desc limit 10";
$page = new Page($sql);
$sql=$page->StartPage();
$qy = $db->query($sql);
$i=0;
while($rs=$db->fetch_array($qy)){
	$articlelist[$i]=$rs;
	$articlelist[$i]['createtime']=date('Y年m月d日',$rs['createtime']);
	$i++;
}
$endpage=$page->EndPage(2,3);

$siteTitle="文章中心_".$siteTitle;
require_once('inc/template.php');
include($template->getfile('articlelist'));
?>