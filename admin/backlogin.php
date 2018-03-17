<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/backlogin.css" />
<title>食尚--后台登录</title>
</head>
<body>
<?php
    session_start();
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("../admin/head.php");
?>

<div id="back">
	<div class="lg"></div>
	<div class="back_con">烹饪与美食的意义是什么？不是为了生存，不是为了填饱肚子，当然也不是为了钞票。胖子厨师古斯特的名言：Everyone can cook.每个人都可以成为以为一位伟大的艺术家，食尚也不例外。在这里，食物不再是生存的基本需要，而是是一种奇妙的创造、奇妙的艺术，品尝美食的过程更是舒适而惬意的享受。</div>

	<form name="backlogin" id="backlogin" method="post" onsubmit="return checkinfo()" action="backlogin_ok.php">
		<div id="back_right">
			<p class="admin">管理员登陆</p>
			<div id="user">
				<p class="p">用户名</p>
				<input class="adminname" type="text" name="adminname">
			</div>

			<div id="pass">
				<p class="p">密码</p>
				<input class="adminpass" type="password" name="password">
			</div>

			<button id="login" type="submit" name="login">登录</button>
			<button id="register" type="reset" name="register">重置</button>
		</div>
	</form>
</div>


<?php
    require_once("../user/bottom.php");
?>
<script type="text/javascript">
function checkinfo(){
	if(backlogin.adminname.value=="")
    {
        alert("请输入用户名");
        backlogin.adminname.focus();
        return false;
    }
    if(backlogin.adminname.value.length<1 || backlogin.adminname.value.length>15) 
    {
        alert("用户名错误");
        backlogin.adminname.focus();
        return false;
    }
    if(backlogin.adminpass.value=="")
    {
        alert("请输入密码");
        backlogin.username.focus();
        return false;
    }
    if(backlogin.adminpass.value.length<1 || backlogin.adminpass.value.length>15) 
    {
        alert("密码错误");
        backlogin.adminpass.focus();
        return false;
    }
}
</script>
</body>
</html>