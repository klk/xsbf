<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('aboutus.html', '4985cde78b8688d2b285bd40f2428b26', 1347979539);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<? include($template->getfile('head')); ?>
<div class="aboutuscon">
<div class="fla-con2">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="930" height="150">
    <param name="movie" value="../img/banner.swf" />
    <param name="quality" value="high" />
    <embed src="../img/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="930" height="150"></embed>
  </object>
</div>
<? include($template->getfile('left')); ?>
<div class="aboutinf">
	  <div class="listtit">当前位置：首页 &gt; 了解京东方 &gt; <?=$rs['title']?></div>
	  <div class="t"><?=$rs['title']?></div>
	 <div class="txt" style="line-height:22px;"><?=$rs['content']?></div>
	</div>
</div>
<? include($template->getfile('foot')); ?>
