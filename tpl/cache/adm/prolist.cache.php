<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/prolist.html', 'ceabcc7e92af72ad337f98530fc11db4', 1347980546);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
</head>
<body>
<div class="admin">
<div class="content">
    	<!--产品列表-->
		<div class="listtit"><span class="left ft14 color6">当前位置： 公司产品 &gt; <a href="<?=$site?>adm/prolist.php?cid1=<?=$cid1?>"><?=$cname1?></a> &gt; <select name="proclass2" onChange="window.location='<?=$site?>adm/prolist.php?cid1=<?=$cid1?>&cid2='+this.value;">
		<option value="0">选择型号</option><? if(is_array($proclass2)) { foreach($proclass2 as $k => $v) { ?><option value="<?=$v['id']?>"<? if($v['id']==$cid2) { ?> selected<? } ?>><?=$v['name']?></option><? } } ?></select></span><a href="<?=$site?>adm/pro.php?act=add&cid1=<?=$cid1?>&cid2=<?=$cid2?>" class="right ft14 btn1">增加新产品</a></div>
       	<div class="list list2"><? if(is_array($proList)) { foreach($proList as $k => $v) { ?>    		<div class="i"><span class="left"><a href="<?=$site?>adm/proshow.php?id=<?=$v['id']?>"><?=$v['title']?></a></span><span class="right"><a href="<?=$site?>adm/pro.php?act=edit&id=<?=$v['id']?>">修改</a><a href="<?=$site?>adm/pro.php?act=del&id=<?=$v['id']?>" onClick="if(!confirm('您确定删除吗？')){ return false;}">删除</a></span></div><? } } ?>        </div>
        <div><?=$endpage?></div>
    </div>
</div>

</body>
</html>
