<?php
require_once('inc.php');
require_once("head.php");

$id=3;
$rs=$db->fetch_first("select * from tech where id='$id'");
if(!$rs['id']){
	$rs=$db->fetch_first("select * from tech order by id asc limit 1");
}

$siteTitle=$rs['title'].'_'.$siteTitle;
require_once('inc/template.php');
include($template->getfile('technology'));
?>