<?php
require_once('../inc.php');
require_once('../inc/page.class.php');
require_once('islogin.php');

$sql="select * from article where status=1 order by id desc limit 10";
$page = new Page($sql);
$sql=$page->StartPage();
$qy = $db->query($sql);
$i=0;
while($rs=$db->fetch_array($qy)){
	$articleList[$i]=$rs;
	$articleList[$i]['createtime']=date('Y-m-d',$rs['createtime']);
	$i++;
}
$endpage=$page->EndPage(2,3);

require_once('../inc/template.php');
include($template->getfile('adm/articlelist'));
?>