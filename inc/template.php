<?php
if(!defined('IN_PINMIX')){ exit('Access Denied');}
require_once(PINMIX_ROOT.'./inc/template/template.class.php');
$options = array(
    'template_dir' => PINMIX_ROOT.'./tpl/', //指定模板文件存放目录
    'cache_dir' => PINMIX_ROOT.'./tpl/cache', //指定缓存文件存放目录
    'auto_update' => true, //当模板文件有改动时重新生成缓存 [关闭该项会快一些]
    'cache_lifetime' => 0, //缓存生命周期(分钟)，为 0 表示永久 [设置为 0 会快一些]
    'suffix' => '.html', //后缀
);
$template = Template::getInstance(); //使用单件模式实例化模板类
$template->setOptions($options); //设置模板参数
//include($template->getfile('test'));//在程序页面最后调用模板文件
?>