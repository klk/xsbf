<?php
//产品分类
$i=0;
$qy=$db->query("select id,name from proclass where pid=0 and status=1 order by id asc");
while($rs=$db->fetch_array($qy)){
	$nav_proclass1[$i]=$rs;
	$j=0;
	$qy2=$db->query("select id,name from proclass where pid='{$rs['id']}' and status=1 order by id asc");
	while($rs2=$db->fetch_array($qy2)){
		$nav_proclass2[$i][$j]=$rs2;
		$j++;
	}
	$i++;
}
?>