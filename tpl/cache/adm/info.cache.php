<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/info.html', '37b478930d68daefca71aa79487e6e23', 1347086622);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<script src="<?=$site?>editor/kindeditor-min.js" type="text/javascript"></script>
<script src="<?=$site?>editor/lang/zh_CN.js" type="text/javascript"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#editor_id');
	});
</script>
</head>
<body>
<div style="margin:25px;">
当前位置：公司资料 &gt; <?=$rs['title']?><br />
<br />
<form name="infoForm" method="post" action="info.php">
<input name="act" type="hidden" value="save" />
<input name="id" type="hidden" value="<?=$rs['id']?>" />
<textarea id="editor_id" name="content" style="width:700px;height:450px;display:none;"><?=$rs['content']?></textarea>
<br />
<input type="image" src="../img/bg_15.png" />
</form>
</div>
</body>
</html>
