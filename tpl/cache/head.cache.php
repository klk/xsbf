<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('head.html', '854b9dc936a564332836c1d9d4ce3b37', 1351782061);?>
<script type="text/javascript">
$(function(){
   $(".nav p").each(function(){
 	  $(this).hover(function(){
		  var w=$(this).width();
	  	 $(this).children("span").show().css("width",w+'px');
		 $(this).children("span").children("a").css("width",w+'px');
	  },function(){
	  	 $(this).children("span").hide();
	  }) 
   });
   $(".nav p.pro_nav").hover(function(){
   	  $(this).children("span").show().css("width",$(this).width()+50+'px');
	  $(this).children("span").children("a").css("width",$(this).width()+50+'px');
   },function(){
	  $(this).children("span").hide();
   })
   $(".nav p.jszl").hover(function(){
   	  $(this).children("span").show().css("width",$(this).width()+50+'px');
	  $(this).children("span").children("a").css("width",$(this).width()+50+'px');
   },function(){
	  $(this).children("span").hide();
   })
   $(".sch .linp").focus(function(){
	  if($(this).val()=='请输入产品关键字'){
	  	$(this).val('');
		$(this).css('color','#666');
	  }
   }).blur(function(){
      if($(this).val()==''){
	  	$(this).val('请输入产品关键字');
		$(this).css('color','#CCC');
	  }
   });
})
</script>
</head>
<body>
<div id="head">
  <div class="logo"><a href="<?=$site?>"></a></div>
</div>
<div class="headnav">
  <p><a href="<?=$site?>" <? if($nowfname=='index') { ?>class="sel"<? } ?>>网站首页</a></p>
  <p> <a href="<?=$site?>aboutus.php" <? if($nowfname=='aboutus') { ?>class="sel"<? } ?>>关于我们</a> </p>
  <p class="pro_nav"> <a href="<?=$site?>prolist.php" <? if($nowfname=='prolist' || $nowfname=='proshow') { ?>class="sel"<? } ?>>产品展示</a> </p>
  <p><a href="<?=$site?>newslist.php" <? if($nowfname=='newslist') { ?>class="sel"<? } ?>>新闻中心</a></p>
  <p class="jszl"><a href="<?=$site?>technology.php" <? if($nowfname=='technology') { ?>class="sel"<? } ?>>证书荣誉</a> </p>
  <p><a href="<?=$site?>contactus.php" <? if($nowfname=='contactus') { ?>class="sel"<? } ?>>联系我们</a></p>
  <div class="sch">
    <form name="schform" method="get" action="<?=$site?>prolist.php">
      <input name="keyword" type="text" value="请输入产品关键字" class="linp" />
      <input type="submit" class="btn" value="" />
    </form>
  </div>
</div>
<div id="wanp">
<div class="container">
