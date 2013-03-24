<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/promain.html', 'e494fdf6f005607d5b8ce5fe68bbb65d', 1346678024);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<script type="text/javascript">
$(function(){
	$(".addpro-lx").click(function(){
		$("#pc1id").val('0'); $("#pc1name").val('');
		var box = new Boxy($("#addpro-lx"),{title:'新添产品类型',modal:true}); box.resize(440,100);
	})
	$(".addpro-xh").click(function(){
		$("#pc2id").val('0'); $("#pc2name").val('');
		var id=$(this).attr('id'); id=id.replace('pid_','');
		$("#pc1id2").attr("value",id);
		var box = new Boxy($("#addpro-xh"),{title:'新添产品型号',modal:true}); box.resize(440,150);
	})

	$("[id^=xg1_]").each(function(){
		var id=$(this).attr('id'); id=id.replace('xg1_','');
		var name=$('#name1_'+id).text();
		$(this).click(function(){
			$("#pc1id").val(id); $("#pc1name").val(name);
			var box = new Boxy($("#addpro-lx"),{title:'修改产品类型',modal:true}); box.resize(440,100);
		});
	});
	$("[id^=xg2_]").each(function(){
		var id=$(this).attr('id'); id=id.replace('xg2_','');
		var name=$('#name2_'+id).text(); var pid=$(this).attr('pid');
		$(this).click(function(){
			$("#pc2id").val(id); $("#pc2name").val(name); $("#pc1id2").attr("value",pid);
			var box = new Boxy($("#addpro-xh"),{title:'修改产品型号',modal:true}); box.resize(440,150);
		});
	});

	$("#pc1form").submit(function(){
		var id=$("#pc1id").val();
		var name=$.trim($("#pc1name").val());
		if(!name){ alert('请填写产品类型名称！');return false;}
		$.post('promain.php',{act:'savepc1',id:id,name:name},function(data){
			if(data=='ok'){ alert('提交成功！'); window.location.reload();}
		});
		return false;
	});
	$("#pc2form").submit(function(){
		var id=$("#pc2id").val();
		var id2=$("#pc1id2").val();
		var name=$.trim($("#pc2name").val());
		if(!name){ alert('请填写产品型号名称!');return false;}
		$.post('promain.php',{act:'savepc2',id:id,pid:id2,name:name},function(data){
			if(data=='ok'){ alert('提交成功！'); window.location.reload();}
		});
		return false;
	});
})
</script>
</head>
<body>
<div class="admin">
<div class="content">
    	<!--产品列表-->
		<div class="listtit"><span class="left ft14 color6">当前位置：<b class="ft14 color6">公司产品</b></span><a href="javascript:;" class="right ft16 addpro-lx">添加新产品类型</a></div>
       	<div class="list"><? if(is_array($proclass1)) { foreach($proclass1 as $key => $val) { ?><div class="t"><span class="left"><a id="name1_<?=$val['id']?>" href="prolist.php?cid1=<?=$val['id']?>" class="tit"><?=$val['name']?></a></span><span class="right"><a id="xg1_<?=$val['id']?>" href="#">修改</a><a href="promain.php?act=del&amp;id=<?=$val['id']?>" onclick="if(!confirm('您确定删除吗？')){return false;}">删除</a><a id="pid_<?=$val['id']?>" href="javascript:;" class="addpro-xh">增加产品型号</a></span></div><? if(is_array($proclass2[$key])) { foreach($proclass2[$key] as $k => $v) { ?><div class="i"><span class="left"><a id="name2_<?=$v['id']?>" href="prolist.php?cid1=<?=$val['id']?>&amp;cid2=<?=$v['id']?>"><?=$v['name']?></a></span><span class="right"><a id="xg2_<?=$v['id']?>" pid="<?=$val['id']?>" href="#">修改</a><a href="promain.php?act=del&amp;id=<?=$v['id']?>" onclick="if(!confirm('您确定删除吗？')){return false;}">删除</a><a href="pro.php?act=add&amp;cid1=<?=$val['id']?>&amp;cid2=<?=$v['id']?>">增加产品</a></span></div><? } } } } ?>        </div>
    </div>
</div>
<!--弹出框-->
<!--添加产品类型-->
<div id="addpro-lx" class="boxy" style="display:none">
	<form id="pc1form">
		<input id="pc1id" name="pc1id" type="hidden" value="0" />
		<p class="txt"><span>产品类型名称：</span><input id="pc1name" name="pc1name" type="text" class="linp"></p>
        <p class="btn"><input type="submit" class="btn1" value="提交" style="cursor:pointer;" /><a href="javascript:;" class="close">取消</a></p>
    </form>
</div>
<!--添加产品型号-->
<div id="addpro-xh" class="boxy" style="display:none">
	<form id="pc2form">
		<input id="pc2id" name="id" type="hidden" value="0" />
		<p class="txt"><span>产品类型：</span><select id="pc1id2" name="pc1id2" style="width:180px;"><? if(is_array($proclass1)) { foreach($proclass1 as $k => $v) { ?><option value="<?=$v['id']?>"><?=$v['name']?></option><? } } ?></select></p>
        <p class="txt"><span>产品型号名称：</span><input id="pc2name" name="pc2name" type="text" class="linp"></p>
        <p class="btn"><input type="submit" class="btn1" value="提交" style="cursor:pointer;" /><a href="javascript:;" class="close">取消</a></p>
    </form>
</div>
</body>
</html>
