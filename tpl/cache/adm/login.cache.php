<? if (!class_exists('template')) die('Access Denied');$template->getInstance()->check('adm/login.html', 'f0c0c2e7fc478a92962e640b3ba676cd', 1348060930);?>

<? include($template->getfile('base')); ?>
<link rel="stylesheet" type="text/css" href="<?=$site?>css/admin.css" />
<script type="text/javascript">
$(function (){
	//刷新验证码
	$("#verify").click(function(){
		$("#verify").attr('src',"../inc/verify.php?temp="+Math.random());
		return false;
	});
	$("#loginform").submit(function(){
		var u=$.trim($("[name=username]").val());
		var p=$.trim($("[name=password]").val());
		var yzm=$.trim($("[name=yzm]").val());
		if(!u || !p || !yzm){ $("#error").text('用户名、密码、验证码不可以为空');return false;}
		$.post('<?=$site?>adm/login.php',{act:'login',u:u,p:p,yzm:yzm},function(data){
			if(data=='yzm'){ $("#error").text('验证码错误');}
			else if(data=='u_p'){ $("#error").text('用户名或密码错误');}
			else{ window.location='<?=$site?>adm/index.php';}
		});
		return false;
	});
});
</script>
</head>
<body class="adminlogin">
<div class="login">
	<div class="logo"></div>
    <div class="logintb">
      <div class="loginform">
        <form id="loginform" name="loginform" method="post" action="login.php">
        <div class="ts" id="error"></div>
        <div class="i">用户名：<input name="username" type="text" value="" class="linp" /></div>
        <div class="i">密　码：<input name="password" type="password" value="" class="linp" /></div>
        <div class="i yzm">
          <span class="t">验证码：</span>
          <span><input name="yzm" type="text" maxlength="4" value="" class="linp"/></span>
          <span><img src="../inc/verify.php" id="verify" alt="点击刷新验证码" title="点击刷新验证码" style="cursor:pointer;" /></span>
        </div>
        <div class="btn"><input type="image" src="../img/btn_6.gif" /></div>
        </form>
      </div>
    </div>
    <div class="adminfoot">Qvodright &copy; 泰兴新晟泵阀制造有限公司</div>
</div>
</body>
</html>