<?php
require_once('inc.php');
require_once("head.php");

$id=intval($_GET['id']);
$rs=$db->fetch_first("select * from info where id='$id'");
if(!$rs['id']){
	$rs=$db->fetch_first("select * from info order by id asc limit 1");
}

$siteTitle=$rs['title'].'_'.$siteTitle;
require_once('inc/template.php');
include($template->getfile('aboutus'));
?>