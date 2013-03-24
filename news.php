<?php
require_once('inc.php');
require_once("head.php");

$id=intval($_GET['id']);
$rs=$db->fetch_first("select * from news where id='$id' and status=1");
$rs['createtime']=date('Y-m-d',$rs['createtime']);

$db->query("update news set clicks=clicks+1 where id='$id'");

$siteTitle=$rs['title'].'_'.$siteTitle;
require_once('inc/template.php');
include($template->getfile('news'));
?>