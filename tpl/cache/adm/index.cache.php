<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/index.html', 'efbba6417ceb2578a6632e16299ece83', 1346678008);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
</head>
<frameset rows="73,*,50" cols="*" frameborder="no" framespacing="0">
  <frame src="<?=$site?>adm/head.php" name="topframe" scrolling="no" noresize="noresize" id="topframe" title="topframe" />
  <frameset cols="150,*" frameborder="no" border="0" framespacing="0" >
    <frame src="<?=$site?>adm/left.php" name="leftframe" id="leftframe" title="leftframe"/>
    <frame src="<?=$site?>adm/admcon.php" name="mainframe" id="mainframe" title="mainframe" />
  </frameset>
  <frame src="<?=$site?>adm/foot.php" name="bottomframe" scrolling="no" noresize="noresize" id="bottomframe" title="bottomframe" />
</frameset>
<noframes>
<body></body>
</noframes>
</html>