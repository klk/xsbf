<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('article.html', '66078e40282097d41592003304254512', 1347091345);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<? include($template->getfile('head')); ?>
<div class="newscon">
	<div class="fla-con2"><div class="pro-a"></div></div> 
  	<div class="listtit">当前位置：首页  &gt; <a href="<?=$site?>articlelist.php">文章中心</a></div>
	<div class="newscontent">
		<div class="t"><?=$rs['title']?></div>
		<div class="time ft12"><span class="timenum">时间：<?=$rs['createtime']?></span><span>点击数：<?=$rs['clicks']?></span></div>
        <div class="txt"><?=$rs['content']?></div>
		<div class="btn" align="center"><a href="<?=$site?>articlelist.php" class="backnews"><img src="../img/bg_10.png" width="9" height="11" />文章首页</a><a href="<?=$site?>"><img src="../img/bg_11.png" width="11" height="11" />网站首页</a></div>
    </div>   
</div>
<? include($template->getfile('foot')); ?>
