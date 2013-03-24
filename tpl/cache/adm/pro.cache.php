<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/pro.html', '17dd43f6904b06fccd9d8a49cb7d1b3a', 1347085677);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<script src="<?=$site?>editor/kindeditor-min.js" type="text/javascript"></script>
<script src="<?=$site?>editor/lang/zh_CN.js" type="text/javascript"></script>
<script language="javascript">
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('#editor_id');
	});

</script>
</head>
<body>
<div class="admin">
<div class="content">
		<div class="listtit"><span class="left ft14 color6">当前位置： 公司产品 &gt; <?=$cname1?> &gt; <? if($act=='edit') { ?>修改产品<? } else { ?>添加产品<? } ?></span></div>
       	<div class="porinf">
		<form id="proForm" name="proForm" method="post" action="pro.php" enctype="multipart/form-data">
		<input name="act" type="hidden" value="save" /><input name="oldact" type="hidden" value="<?=$act?>" />
		<input name="id" type="hidden" value="<?=$rs['id']?>" /><input name="cid1" type="hidden" value="<?=$cid1?>" />
            <p><span>产品名称：</span><input name="title" type="text" class="linp" value="<?=$rs['title']?>"></p>
            <p><span>产品型号：</span><select name="cid2">
			<option value="0">选择型号</option><? if(is_array($proclass2)) { foreach($proclass2 as $k => $v) { ?><option value="<?=$v['id']?>"<? if($v['id']==$cid2) { ?> selected<? } ?>><?=$v['name']?></option><? } } ?></select>
			</select></p>
			<p><span>产品描述：</span><textarea id="editor_id" name="content" style="width:700px;height:350px;display:none;"><?=$rs['content']?></textarea></p>
            <p><span>产品形象图：</span><input name="pic" type="file" class="addfile"><? if($rs['pic']) { ?><br /><br /><img src="<?=$site?><?=$rs['pic']?>" /><? } ?></p>
            <p class="btn clear"><input type="image" src="../img/bg_15.png" class="left" /> &nbsp; <a href="javascript:history.go(-1);">返回</a></p>
		</form>
        </div>
    </div>
</div>

</body>
</html>
