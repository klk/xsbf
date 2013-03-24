<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('technology.html', '6396fae63bbf6df7f661791f1d75af7e', 1347980315);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<? include($template->getfile('head')); ?>
<div>
    <div class="fla-con2">
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="930" height="150">
		<param name="movie" value="../img/banner.swf" />
		<param name="quality" value="high" />
		<embed src="../img/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="930" height="150"></embed>
	  </object>
	</div>
<? include($template->getfile('left')); ?>
    <div class="articlecon">
    	<div class="listtit">当前位置：首页  &gt;  技术质量  &gt;  <?=$rs['title']?></div>
    	<div class="articleinf">
            <div class="tit colorB" style="text-align:left;font-size:16px;"><?=$rs['title']?></div>
            <div class="txt" style="padding:0"><?=$rs['content']?></div>
        </div>
    </div>
</div>
<? include($template->getfile('foot')); ?>
