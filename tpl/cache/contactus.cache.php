<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('contactus.html', 'ab2a9366dfad451dc20451e290f25924', 1348057417);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<? include($template->getfile('head')); ?>
<div class="contactus">
    <div class="fla-con2">
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="930" height="150">
		<param name="movie" value="../img/banner.swf" />
		<param name="quality" value="high" />
		<embed src="../img/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="930" height="150"></embed>
	  </object>
	</div>
    <div class="contactusinf">
        <div class="list">
        <div class="listtit">当前位置：首页  >  联系我们</div>
    	<div class="t">泰兴新晟泵阀制造有限公司</div>
        <div class="txt"><?=$rs['content']?></div>
    </div>
</div>
<? include($template->getfile('foot')); ?>
