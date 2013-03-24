<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('articlelist.html', 'beb138a671f78380ce7b8fbedfebc634', 1347800282);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<link rel="stylesheet" type="text/css" href="<?=$site?>css/page.css" />
<? include($template->getfile('head')); ?>
<div class="newscon">
    <div class="fla-con2">
  		<div class="pro-a"></div><div class="pro-b"></div>
  	</div>
    <div class="list">
    	<div class="listtit">当前位置：首页  &gt;  文章中心</div>
    	<ul>
        <? if(is_array($articlelist)) { foreach($articlelist as $k => $v) { ?>    		<li><a href="<?=$site?>article.php?id=<?=$v['id']?>"><?=$v['title']?></a><span><?=$v['createtime']?></span></li>
            <? } } ?>    	</ul>
    	<div class="page"><?=$endpage?></div>
	</div>
</div>
<? include($template->getfile('foot')); ?>
