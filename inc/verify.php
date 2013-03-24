<?php
session_start();
$string  = random(4);
$len     = strlen($string);
$bdcolor = "#deebdd";
$bgcolor = "#deebdd";
$height  = 30;
$width   = 80;
$image   = imagecreate($width, $height);
//画边框
$bdcolor = getcolor($image,$bdcolor);
imagefilledrectangle($image,0,0,$width+1,$height+1,$bdcolor); 
//画背景
$bgcolor = getcolor($image,$bgcolor);
imagefilledrectangle($image,1,1,$width-2,$height-2,$bgcolor);
//画干扰元素
$num     = 200; //干扰元素个数
setnoise($image,$width,$height,$num);
$size    = ceil($width / $len); //字体大小
//写字
for($i=0;$i<$len;$i++)
{
	$TempText  = substr($string,$i,1);
	$textColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));//字体颜色
	$randsize  = rand($size-$size/5,$size+$size/5);//取得随机大小
	$font      = "arial.ttf"; //取得字体
	$randAngle = rand(-15,15);//取得角度
	$x = 8+($width-$width/8)/$len*$i;//取得每次的位置
	$y = rand($height-3,$height-10); //取得每次的高度
	imagettftext($image,$randsize,$randAngle,$x,$y,$textColor,$font,$TempText);
}
header("Content-type: image/png");
$_SESSION['vercode']=$string;
imagepng($image);
imagedestroy($image);

//取随机字符
function random($len)
{
	$str = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
	return substr(str_shuffle($str),0,$len);
}
//取得色彩
function getcolor($image,$color)
{
	global $image;
	$color = eregi_replace ("^#","",$color);
	$r = $color[0].$color[1];
	$r = hexdec ($r);
	$b = $color[2].$color[3];
	$b = hexdec ($b);
	$g = $color[4].$color[5];
	$g = hexdec ($g);
	$color = imagecolorallocate($image, $r, $b, $g); 
	return $color;
}
//画干扰点
function setnoise($image,$width,$height,$noisenum)
{
	for ($i=0; $i<$noisenum; $i++){	
		$randColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));//分配颜色	
		imageSetPixel($image, rand(0, $width), rand(0, $height), $randColor);//画点  
	} 
}
?>