<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('newslist.html', '4f473ce5b7e6001828d6c57b7b1fef0a', 1347980134);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<link rel="stylesheet" type="text/css" href="<?=$site?>css/page.css" />
<? include($template->getfile('head')); ?>
<div class="newscon">
    <div class="fla-con2">
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="930" height="150">
		<param name="movie" value="../img/banner.swf" />
		<param name="quality" value="high" />
		<embed src="../img/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="930" height="150"></embed>
	  </object>
	</div>
    <div class="list">
    	<div class="listtit">当前位置：首页  &gt;  新闻中心</div>
    	<ul>
        <? if(is_array($newslist)) { foreach($newslist as $k => $v) { ?>    		<li><a href="<?=$site?>news.php?id=<?=$v['id']?>"><?=$v['title']?></a><span><?=$v['createtime']?></span></li>
            <? } } ?>    	</ul>
    	<div class="page"><?=$endpage?></div>
	</div>
</div>
<? include($template->getfile('foot')); ?>
