<?php
require_once('../inc.php');
require_once('islogin.php');

//公司资料
$i=0;
$qy=$db->query("select id,title from info order by id asc limit 4");
while($rs=$db->fetch_array($qy)){
	$infoList[$i]=$rs;
	$i++;
}

//产品分类
$i=0;
$qy=$db->query("select id,name from proclass where pid=0 and status=1 order by id asc");
while($rs=$db->fetch_array($qy)){
	$proclassList[$i]=$rs;
	$i++;
}

//技术质量
$i=0;
$qy=$db->query("select id,title from tech order by id asc limit 3");
while($rs=$db->fetch_array($qy)){
	$techList[$i]=$rs;
	$i++;
}

require_once('../inc/template.php');
include($template->getfile('adm/left'));
?>