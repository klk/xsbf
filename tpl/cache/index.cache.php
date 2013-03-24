<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('index.html', 'bc24df89426c63acf3764c89c6fcb031', 1351783985);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<script type="text/javascript">
$(function(){
	$(".soll-img").hide();
	$(".soll-img").eq(0).show();
	var len=$(".soll-img").length;
	for(i=1;i<=len;i++){
		$(".soll-tool").append("<a href='javascript:;' name='soll-tool-"+i+"'></a>");
	}
	$(".fla .soll-tool a").last().addClass("sel");
	var int=setInterval(function(){//循环展示
		sollimg();
	},5000);
	$(".fla .soll-tool a").each(function(){
        $(this).click(function(){
			p=$(this).attr("name").substr(10,1);
			q=len-p;
			$(".fla .soll-tool a").removeClass("sel");
			$(this).addClass("sel");
			$(".soll-img").hide();
			$(".soll-img").eq(q).fadeIn();
		});
    });
	$(".fla .soll-tool").hover(function(){
		int=window.clearInterval(int);
	},function(){
		int=setInterval(function(){//循环展示
			sollimg();
		},5000);
	})
	//产品循环展示
	var int2=setInterval(function(){//循环展示
		sollpro();
	},3000);
})
function sollpro(){
	$(".index_product .list ul").animate({left:"-134px"},function(){
		$(".index_product .list li:first").insertAfter(".index_product .list li:last");
		$(".index_product .list ul").css('left','0px');
	});
}
function sollimg(){
	var len=$(".soll-img").length;
	var s=len-$(".fla .soll-tool .sel").attr("name").substr(10,1);
	s++;
	if(s==len){s=0;}
	var t=len-s-1;
	$(".fla .soll-tool a").removeClass("sel");
	$(".fla .soll-tool a").eq(t).addClass("sel");
	$(".soll-img").hide();
	$(".soll-img").eq(s).fadeIn();
}
</script>
<? include($template->getfile('head')); ?>
<!--图片切换-->
<div class="fla-con">
  	<div class="fla"><? if(is_array($bannerlist)) { foreach($bannerlist as $k => $v) { ?><div class="soll-2 soll-img"><p><img src="<?=$site?><?=$v['url']?>" /></p></div><? } } ?>      	<div class="soll-tool"></div>
    </div>
  	
</div>
<div style="width:930px;overflow:hidden">
<div class="leftcon">
<? include($template->getfile('left')); ?>
</div>
<div class="rightcon">
	<div class="index_product t1">
		<div class="t">推荐产品 | PRODUCTS</div>
		<div class="list">
			<ul><? if(is_array($prolist)) { foreach($prolist as $k => $v) { ?><li><a href="<?=$site?>proshow.php?id=<?=$v['id']?>"><img src="<?=$site?><?=$v['pic']?>" width="110" height="110" /></a>
					<a href="<?=$site?>proshow.php?id=<?=$v['id']?>" title="<?=$titleall?>"><?=$v['title']?></a></li><? } } ?></ul>
		</div>
	</div>
	<div class="index_aboutus t1">
		<div class="t">公司简介 | ABOUT US</div>
	  	<div class="aboutus">
			<p><?=$aboutus?> <a href="<?=$site?>aboutus.php"> [ 更多 ]</a></p>
	  	</div>
	</div>
	<div class="data t1">
		<div class="t">公司新闻 | NEWS</div>
	  	<div class="newslist">
			<ul><? if(is_array($news)) { foreach($news as $k => $v) { ?><li><a href="<?=$site?>news.php?id=<?=$v['id']?>"><?=$v['title']?></a></li><? } } ?></ul>
			<div style="width:390px" align="right"><br/><a href="<?=$site?>newslist.php">更多&gt;&gt; </a></div>
	  	</div>
	</div>
	<div class="index_contactus">
		<a href="<?=$site?>contactus.php"><img src="<?=$site?>img/bg_8.png" /></a>
	</div>
	<div class="clear"></div>
</div>
</div>
<? include($template->getfile('foot')); ?>
