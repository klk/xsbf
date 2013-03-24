<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/proshow.html', '0b492ec3d150883518160f2e8aa52a10', 1347085718);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<script src="<?=$site?>editor/kindeditor-min.js" type="text/javascript"></script>
<script src="<?=$site?>editor/lang/zh_CN.js" type="text/javascript"></script>
<style type="text/css">
.file_list td{border-bottom:1px dashed #DDD;padding:5px 0}
</style>
</head>
<body>
<div class="admin">
<div class="content">
		<div class="listtit"><span class="left ft14 color6">当前位置： 公司产品 &gt; <a href="<?=$site?>adm/prolist.php?cid1=<?=$cid1?>"><?=$cname1?></a> &gt; 产品信息</span></div>
       	<div class="porinf">
			<form id="sForm" name="sForm" method="post" action="proshow.php" enctype="multipart/form-data">
			<input name="act" type="hidden" value="savespec" /><input name="pid" type="hidden" value="<?=$id?>" />
            <p style="margin-bottom:10px"><span>产品名称：</span><?=$title?></p>
            <p><span>产品型号：</span><?=$cname2?></p>
			<p><span>产品描述：</span><?=$content?></p>
            <p><span>产品形象图：</span><? if($rs['pic']) { ?><br /><br /><img src="<?=$site?><?=$rs['pic']?>" /><? } ?></p>
			<p><span>产品样本：</span><input name="pic" type="file" style="border:1px solid #CCC"/> <input type="submit" value="上传" style="border:1px solid #CCC;height:18px;width:60px;line-height:14px"/></p>
			</form>
        </div>
		<div>
			<table width="600">
			<col width="30" /><col width="420" /><col width="150" /><? if(is_array($specList)) { foreach($specList as $k => $v) { ?><tr><td height="20"><?=$k?>.</td><td><a href="<?=$site?><?=$v['url']?>" target="_blank"><?=$v['title']?></a></td><td><a href="proshow.php?act=del&amp;id=<?=$v['id']?>" onClick="if(!confirm('您确定删除吗？')){return false;}">删除</a></td></tr><? } } ?></table>
		</div>
    </div>
</div>

</body>
</html>
