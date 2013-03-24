<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('prolist.html', '5d850eccdc663148f88f3051b574f7f0', 1348501983);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<link rel="stylesheet" type="text/css" href="<?=$site?>css/page.css" />
<? include($template->getfile('head')); ?>
<div class="pro">
	<div class="fla-con2">
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="930" height="150">
		<param name="movie" value="../img/banner.swf" />
		<param name="quality" value="high" />
		<embed src="../img/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="930" height="150"></embed>
	  </object>
	</div>
    <div>
        
<? include($template->getfile('left')); ?>
        <div class="list">
        <div class="listtit">当前位置：首页  &gt;  <? if($keyword) { ?>产品搜索<? } else { ?>产品展示<? if($cid1) { ?>  &gt;  <?=$cid1name?><? } } ?></div>
        <? if($prolist) { ?>
        <ul class="prolistshow">
            <? if(is_array($prolist)) { foreach($prolist as $k => $v) { ?>            <li>
				<a href="<?=$site?>proshow.php?id=<?=$v['id']?>" target="_blank" ><img src="<?=$site?><?=$v['pic']?>" /></a>
				<a href="<?=$site?>proshow.php?id=<?=$v['id']?>" target="_blank" title="<?=$titleall?>"><?=$v['title']?></a>
			</li>
            <? } } ?>        </ul>
        <div class="page"><?=$endpage?></div>
        <? } else { ?>
        暂无该产品~！如有所需请联系业务部 0523-87437929
        <? } ?>
        </div>
    </div>
</div>
<? include($template->getfile('foot')); ?>
  