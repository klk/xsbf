<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('proshow.html', 'c53650f50a323c182e021a7f45d079f2', 1348058367);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/main.css" />
<link rel="stylesheet" type="text/css" href="<?=$site?>css/page.css" />
<script type="text/javascript">
</script>
<? include($template->getfile('head')); ?>
<div class="pro proshow">
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
        	<div class="listtit">当前位置：首页  &gt;  <? if($keyword) { ?>产品搜索<? } else { ?>产品展示<? if($cid1) { ?>  &gt;  <?=$cname1?><? } } ?></div>
            <div>
            	<div class="ft26"><b class="colorGrn"><?=$title?></b></div>
                <div class="sort"><span><b>产品类型：</b><?=$cname1?></span><span><b>产品型号：</b><?=$cname2?></span></div>
                <div class="file_list">
                 	<div class="img"><? if($rs['pic']) { ?><img src="<?=$site?><?=$rs['pic']?>" /><? } ?></div>
					<div class="txt"><?=$content?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<? include($template->getfile('foot')); ?>
  