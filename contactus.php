<?php
require_once('inc.php');
require_once("head.php");

$rs=$db->fetch_first("select * from contact where id=1");


$siteTitle='联系我们_'.$siteTitle;
require_once('inc/template.php');
include($template->getfile('contactus'));
?>