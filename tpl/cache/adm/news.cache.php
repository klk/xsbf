<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/news.html', 'b0da1063de44af28e5a89232b468c7b6', 1348060548);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<script src="<?=$site?>editor/kindeditor-min.js" type="text/javascript"></script>
<script src="<?=$site?>editor/lang/zh_CN.js" type="text/javascript"></script>
<script language="javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#editor_id');
	});

function chk(f){
	if(f.title.value==''){ alert('请填写新闻标题！'); f.title.focus(); return false;}
}
</script>
</head>
<body>
<div class="admin">
	<div class="content">

		<div class="listtit"><span class="left ft14 color6">当前位置： 公司新闻 > <? if($act=='edit') { ?>修改新闻<? } else { ?>添加新闻<? } ?></span></div>
       	<div class="porinf">
			<form id="newsForm" name="newsForm" method="post" action="news.php" onsubmit="return chk(this);">
			<input name="act" type="hidden" value="save" />
			<input name="oldact" type="hidden" value="<?=$act?>" />
			<input name="id" type="hidden" value="<?=$rs['id']?>" />
            <p><span>新闻标题：</span><br/><input id="title" name="title" type="text" class="linp" value="<?=$rs['title']?>" /></p>
            <p><span>新闻内容：</span><br/>
            	<textarea id="editor_id" name="content" style="width:700px;height:350px;display:none;"><?=$rs['content']?></textarea>
            </p>
            <p class="btn clear"><input type="image" src="../img/bg_15.png" class="left" /> &nbsp; <a href="javascript:history.go(-1);">返回</a></p>
        </div>
    </div>
</div>

</body>
</html>