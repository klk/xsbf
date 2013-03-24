<?php
if(!defined('IN_PINMIX')){ exit('Access Denied');}
//COOKIE前缀
function cookiepre(){
	return substr(md5('D^5jdfjdf#2c!&7eY'),0,5);
}
//建立COOKIE
function cookie($ck_var,$ck_value,$ck_life = 0,$ck_path = '/',$ck_domain = ''){
	global $timestamp;
	$S = $_SERVER['SERVER_PORT'] == '443' ? 1:0;
	setcookie(cookiepre().'_'.$ck_var,$ck_value,$ck_life ? $timestamp + $ck_life : 0,$ck_path,$ck_domain,$S);
}
//清除COOKIE
function clear_cookie($var){
	cookie($var,'',-86400 * 365);
}
//获取COOKIE
function get_cookie($var){
	return $_COOKIE[cookiepre().'_'.$var];
}
//加解密字符串
function strcode($string,$action='ENCODE'){
	$key	= substr(md5($_SERVER["HTTP_USER_AGENT"].'D^5jdfjdf#2c!&7eY'),8,18);
	$string	= $action == 'ENCODE' ? $string : base64_decode($string);
	$len	= strlen($key);
	$code	= '';
	for($i=0; $i<strlen($string); $i++){
		$k		= $i % $len;
		$code  .= $string[$i] ^ $key[$k];
	}
	$code = $action == 'DECODE' ? $code : base64_encode($code);
	return $code;
}
//标准化网址
function http($url){
	if($url=='http://'){ $url='';}
	if($url && substr($url,0,7)!='http://'){ $url='http://'.$url;}
	return $url;
}
//魔法引用 转义
function daddslashes($string, $force = 0){
	if(!$GLOBALS['magic_quotes_gpc'] || $force){
		if(is_array($string)){
			foreach($string as $key => $val){
				$string[$key] = daddslashes($val, $force);
			}
		}else{  $string = addslashes($string);}
	}
	return $string;
}
function dhtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4}));)/', '&\\1',
		str_replace(array('&', '"', '<', '>', ' '), array('&amp;', '&quot;', '&lt;', '&gt;', '&nbsp;'), $string));
	}
	return $string;
}
//是否有非法字符
function illegal_str($string){
	$length=strlen($string);
	for($n=0; $n<$length; $n++)
	{
		$t = ord($string[$n]);
		if( (47<$t && $t<58) || (64<$t && $t<91) || (96<$t && $t<123) || $t==32 || $t==45 || $t==95 || $t>126){ return false;}
		else{return true;}
	}
}
//获取文件扩展名
function fileext($filename) {
	$ext=trim(substr(strrchr($filename, '.'), 1, 10));
	return strtolower($ext);
}
//生成随机字符串
function random($len,$sty=0,$repeat=0){
	$s1='1234567890';
	$s2='abcdefghijklmnopqrstuvwxyz';
	switch($sty){
		case 1: $s = '1234567890'; break;
		case 2: $s = $s2; break;
		case 3: $s = strtoupper($s2); break;
		default: $s= $s1.$s2.strtoupper($s2); break;
	}
	if($repeat){ $s=str_repeat($s,$repeat);}
	return substr(str_shuffle($s),0,$len);
}
//截取字符串
function cutstr($string, $length, $dot = '...') {
	global $charset;
	if(strlen($string) <= $length) { return $string;}
	$string = trim(strip_tags($string));
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;', '&nbsp;'), array('&', '"', '<', '>', ''), $string);
	$strcut = '';
	if(strtolower($charset) == 'utf-8') {
		$n = $tn = $noc = 0;
		while($n < strlen($string)) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t <= 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);		
	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}
	$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);
	return $strcut.$dot;
}

//弹错跳转
function alert($str,$url=''){
	if($url){ $t="location='$url'";}else{ $t="history.back()";}
	$t="<script type=\"text/javascript\">alert('{$str}');{$t};</script>";
	echo $t; exit();
}
//直接跳转
function location($url){
	header("location: $url"); exit();
}

//创建缩略图在120宽高正方形之内
function thumb($oldimg, $newimg, $wh=120)
{
	list($width, $height, $type) = getimagesize($oldimg);
	if($width<=$wh && $height<=$wh) {  
		$p = 1;
	}else{
		if($width<$height){ $p = $wh/$height;}else{ $p = $wh/$width;}
	}
	$h = intval($height*$p);
	$w = intval($width*$p);	
	$img= ($type==1)?imagecreatefromgif($oldimg):(($type==2)?imagecreatefromjpeg($oldimg):imagecreatefrompng($oldimg));
	//imagesavealpha($img,true);
	$thumb = imagecreatetruecolor($w, $h);
	//imagealphablending($thumb,false);
	//imagesavealpha($thumb,true);
	if(function_exists("imagecreatetruecolor")){
		imagecopyresampled($thumb, $img, 0, 0, 0, 0, $w, $h, $width , $height);
	}else{
		imagecopyresized($thumb, $img, 0, 0, 0, 0, $w, $h, $width , $height);
	}
	($type==1)? imagegif ($thumb, $newimg, 100): (($type==2)? imagejpeg($thumb, $newimg, 100): imagepng($thumb, $newimg));
	imagedestroy($img);
	imagedestroy($thumb);	
	return $newimg;
}
//创建缩略图按宽等比缩放
function thumb_w($oldimg, $newimg, $w=200)
{
	list($width, $height, $type) = getimagesize($oldimg);
	if($width>$w){
		$h=intval($height*$w/$width);
	}else{
		$w=$width;
		$h=$height;
	}
	$img= ($type==1)?imagecreatefromgif($oldimg):(($type==2)?imagecreatefromjpeg($oldimg):imagecreatefrompng($oldimg));
	$thumb = imagecreatetruecolor($w, $h);
	if(function_exists("imagecreatetruecolor")){
		imagecopyresampled($thumb, $img, 0, 0, 0, 0, $w, $h, $width , $height);
	}else{
		imagecopyresized($thumb, $img, 0, 0, 0, 0, $w, $h, $width , $height);
	}
	($type==1)? imagegif ($thumb, $newimg, 100): (($type==2)? imagejpeg($thumb, $newimg, 100): imagepng($thumb, $newimg));
	imagedestroy($img);
	imagedestroy($thumb);	
	return $newimg;
}
//获取远程图片
function getImage($url,$filename="") { 
  if(!$url) return false;
  if(!$filename) { 
    $ext=strrchr(strtolower($url),"."); 
    if($ext!=".gif" && $ext!=".jpg" && $ext!=".png") return false;
   // $filename="pic/pic6".$ext; 
  } 
  ob_start(); 
  readfile($url); 
  $img = ob_get_contents(); 
  ob_end_clean(); 
  $fp2=@fopen($filename, "a");//保存路径
  fwrite($fp2,$img); 
  fclose($fp2); 
  return $filename;
}

/**获取ip信息**/
function fopen_url($url) { 
    if (function_exists('file_get_contents')) { 
        $file_content = @file_get_contents($url); 
    } elseif (ini_get('allow_url_fopen') && ($file = @fopen($url, 'rb'))){ 
        $i = 0; 
        while (!feof($file) && $i++ < 1000) { 
            $file_content .= strtolower(fread($file, 4096)); 
        } 
        fclose($file); 
    } elseif (function_exists('curl_init')) { 
        $curl_handle = curl_init(); 
        curl_setopt($curl_handle, CURLOPT_URL, $url); 
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT,2); 
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($curl_handle, CURLOPT_FAILONERROR,1); 
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Trackback Spam Check'); 
        $file_content = curl_exec($curl_handle); 
        curl_close($curl_handle); 
    } else { 
        $file_content = ''; 
    } 
    return $file_content; 
}
function unicodeDecode($content){
    $pattern = '/(\\\u([\w]{4}))/i';
    preg_match_all($pattern, $content, $matches);
    if (!empty($matches)){
        for ($j = 0; $j < count($matches[0]); $j++){
            $str = $matches[0][$j];
            if (strpos($str, '\\u') === 0){
                $code = base_convert(substr($str, 2, 2), 16, 10);
                $code2 = base_convert(substr($str, 4), 16, 10);
                $c = chr($code).chr($code2);
    			$c=mb_convert_encoding($c, "utf-8", 'UCS-2');
    			$content=str_replace($matches[0][$j],$c,$content);
            }else{
                $content .= $str;
            }
        }
    }
    return $content;
}
function getIpInfo($ip){
	$url='http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip='.$ip;
	$content=fopen_url($url);
	$content=unicodeDecode($content);
	//$content='var remote_ip_info = {"ret":1,"start":"61.147.118.0","end":"61.147.127.255","country":"中国","province":"江苏","city":"扬州","district":"","isp":"电信","type":"机房","desc":"跃进桥东大楼电信数据中心机房"};';
	$content=str_replace('var remote_ip_info = ','',$content);
	$content=str_replace('};','}',$content);
	$arr=json_decode($content);
	$arr=get_object_vars($arr);
	return $arr;
}
//短信接口
function sendSMS($mobile,$smsContent='')
{
		$url="http://www.sms8080.com/smssend.asp?userid=czpmkj&userkey=123123&PhoneNumber={$mobile}&SmsContent={$smsContent}&Subnumber=4";	
		$str = file_get_contents($url);
		return $str;
}
?>