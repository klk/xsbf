<?php
header("content-type:text/html;charset=utf-8");
$con = mysql_connect('112.121.167.173', 'a0810002707', 'jwh5201314')or die('无法连接数据库' . mysql_errno());
if ($con) {
  echo '能连接数据库ok!<br>';
}

mysql_select_db('a0810002707',$con);
mysql_query("set names utf8");
$sql="SELECT * FROM  `article` LIMIT 0 , 30";
$query = mysql_query($sql, $con);
while($rs=mysql_fetch_array($query)){
	echo $rs['id'].$rs['title'].'<br>';
}

echo "<br>";
echo phpinfo();
?>