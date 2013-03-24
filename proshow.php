<?php
require_once('inc.php');
require_once('inc/page.class.php');
require_once("head.php");

$id=intval($_GET['id']);
$rs=$db->fetch_first("select * from product where id='$id' and status=1");
$title=$rs['title'];
$content=$rs['content'];
$createtime=date('Y-m-d',$rs['createtime']);
$cid1=$rs['cid1'];
$cid2=$rs['cid2'];
$cname1=$db->result_first("select name from proclass where id='$cid1'");
$cname2=$db->result_first("select name from proclass where id='$cid2'");

$siteTitle=$n.'_'.$siteTitle;
require_once('inc/template.php');
include($template->getfile('proshow'));
?>