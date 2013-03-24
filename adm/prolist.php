<?php
require_once('../inc.php');
require_once('islogin.php');

$cid1=intval($_GET['cid1']);
$cid2=intval($_GET['cid2']);

$cname1=$db->result_first("select name from proclass where id='$cid1'");
$i=0;
$qy=$db->query("select id,name from proclass where pid='{$cid1}' and status=1 order by id asc");
while($rs=$db->fetch_array($qy)){
	$proclass2[$i]=$rs;
	$i++;
}

require_once('../inc/page.class.php');
$sql="select id,title from product where status=1 and cid1='$cid1' ";
if($cid2){ $sql.="and cid2='$cid2' ";}
$sql.="order by id desc limit 10";
$page = new Page($sql);
$sql=$page->StartPage();
$qy = $db->query($sql);
$i=0;
while($rs=$db->fetch_array($qy)){
	$proList[$i]=$rs;
	$i++;
}
$endpage=$page->EndPage(2,3);

require_once('../inc/template.php');
include($template->getfile('adm/prolist'));
?>