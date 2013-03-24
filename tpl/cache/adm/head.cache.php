<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/head.html', '519e69488196ee08cbb438ba9b7c9a6b', 1346678008);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
</head>
<body>
<div class="admin">
  <div class="head">
    <div class="logo"><a href="<?=$site?>" target="_blank" title="打开京东方首页"></a></div>
    <div class="txt">企业后台管理</div>
    <div class="esc"><a href="<?=$site?>adm/login.php?act=exit" target="_top">退出管理</a></div>
  </div>
</div>
</body>
</html>
