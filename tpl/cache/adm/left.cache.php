<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/left.html', 'd2c6e58d30977ba218aeed140e4d42dd', 1346678008);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<base target="mainframe" />
<script language="javascript">
$(document).ready(function(){
	$("a").click(function(){
		$(".m_cur").removeClass('m_cur').addClass('m_def');
		$(this).addClass('m_cur');
	});
});
</script>
</head>
<body style="height:100%;">
<div class="leftcon">
    <div class="nav">
        <ul>
            <li>
                <a href="info.php?id=1" class="m_tit m_def">公司资料</a>
                <div class="list"><? if(is_array($infoList)) { foreach($infoList as $k => $v) { ?>                    <a href="<?=$site?>adm/info.php?id=<?=$v['id']?>" class="m_def"><?=$v['title']?></a><? } } ?>                </div>
            </li>
			<li>
                <a href="<?=$site?>adm/promain.php" class="m_tit m_def">公司产品</a>
                <div class="list">
                <? if(is_array($proclassList)) { foreach($proclassList as $k => $v) { ?>                    <a href="<?=$site?>adm/prolist.php?cid1=<?=$v['id']?>" class="m_def"><?=$v['name']?></a><? } } ?>                </div>
            </li>
            <li>
                <a href="<?=$site?>adm/newslist.php" class="m_tit m_def">新闻中心</a>
            </li>
            <li>
                <a href="<?=$site?>adm/articlelist.php" class="m_tit m_def">文章中心</a>
            </li>
            <li>
                <a href="<?=$site?>adm/tech.php?id=1" class="m_tit m_def">技术质量</a>
                <div class="list"><? if(is_array($techList)) { foreach($techList as $k => $v) { ?>                    <a href="<?=$site?>adm/tech.php?id=<?=$v['id']?>" class="m_def"><?=$v['title']?></a><? } } ?>                </div>
            </li>
			<li>
                <a href="<?=$site?>adm/contactus.php" class="m_tit m_def">联系我们</a>
            </li>
			<li>
                <a href="<?=$site?>adm/banner.php" class="m_tit m_def">首页banner</a>
            </li>
			<li>
                <a href="<?=$site?>adm/password.php" class="m_tit m_def">修改密码</a>
            </li>
			<li>
                <a href="<?=$site?>adm/login.php?act=exit" class="m_tit m_def" target="_top">退出管理</a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
