<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/banner.html', '8c5892bcebc84ad570af946a36e4c83b', 1346678028);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />

</head>
<body>
<div class="admin">
<div class="content">
    <div class="listtit"><span class="left ft14 color6">当前位置： 首页banner</span></div>
    <form id="bannerForm" name="bannerForm" method="post" action="banner.php" enctype="multipart/form-data">
    <input name="act" type="hidden" value="save" />
    <p class="ft14" style="margin:10px 0;">选择首页滚动展示图片：</p>
    <p style="margin-bottom:20px;"><input name="pic" type="file" style="width:400px;border:1px solid #CCC"/></p>
    <p><input type="submit" value="上传banner" class="btn1" style="line-height:22px;" /><br/><br/><br/></p>
    </form>
    <ul style="width:830px;">
    <? if(is_array($bannerList)) { foreach($bannerList as $k => $v) { ?>    <li style="float:left;margin:0 5px 10px 0;"><img src="<?=$site?><?=$v['url_min']?>" /><br /><a href="banner.php?act=del&amp;id=<?=$v['id']?>" onClick="if(!confirm('您确定删除吗？')){ return false;}" >删除</a></li>
    <? } } ?>    </ul>
</div>
</div>
</body>
</html>