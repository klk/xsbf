<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('news.html', 'a13b5cd58cd710e7446b073c9d9ad6e4', 1347980135);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<? include($template->getfile('head')); ?>
<div class="newscon">
	<div class="fla-con2">
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="930" height="150">
		<param name="movie" value="../img/banner.swf" />
		<param name="quality" value="high" />
		<embed src="../img/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="930" height="150"></embed>
	  </object>
	</div> 
  	<div class="listtit">当前位置：首页  &gt;  新闻中心</div>
	<div class="newscontent">
		<div class="t"><?=$rs['title']?></div>
		<div class="time ft12"><span class="timenum">时间：<?=$rs['createtime']?></span><span>点击数：<?=$rs['clicks']?></span></div>
        <div class="txt"><?=$rs['content']?></div>
		<div class="btn" align="center"><a href="<?=$site?>newslist.php" class="backnews"><img src="../img/bg_10.png" width="9" height="11" />新闻首页</a><a href="<?=$site?>"><img src="../img/bg_11.png" width="11" height="11" />网站首页</a></div>
    </div>   
</div>
<? include($template->getfile('foot')); ?>