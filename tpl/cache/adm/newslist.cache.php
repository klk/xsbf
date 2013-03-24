<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/newslist.html', '604b10fbde5d32733626506ce08af9d2', 1348060544);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<link rel="stylesheet" type="text/css" href="<?=$site?>css/page.css" />
<script language="javascript">
$(document).ready(function(){
	$("[id^=del_]").each(function(){
		var nid=$(this).attr('id');
		nid=nid.replace('del_','');
		$(this).click(function(){
			if(confirm('您确定要删除此新闻吗？')){
				$.post("<?=$site?>adm/news.php",{act:'del',id:nid},function(data){
					if(data=='ok'){ window.location.reload();}
				});
			}
		});
	});
});
</script>
</head>
<body>
<div class="admin">
<div class="content">
		<div class="listtit"><span class="left ft14 color6">当前位置： 公司新闻</span><a href="<?=$site?>adm/news.php?act=add" class="right ft14 btn1">增加新闻</a></div>
       	<div class="list list2"><? if(is_array($newslist)) { foreach($newslist as $k => $v) { ?><div class="i"><span class="left"><a href="<?=$site?>news.php?id=<?=$v['id']?>" target='_blank'><?=$v['title']?></a></span><span class="right"><b><?=$v['createtime']?></b><a href="<?=$site?>adm/news.php?act=edit&id=<?=$v['id']?>">修改</a><a id="del_<?=$v['id']?>" href="#">删除</a></span></div>
        <? } } ?>        </div>
        <div><?=$endpage?></div>
    </div>
</div>
</div>
</body>
</html>
