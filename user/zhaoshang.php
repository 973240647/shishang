<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/zhaoshang.css" />
<title>食尚---菜单料理</title>
<style>
</style>
</head>
<body>
<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("head.php");
?>
<form name="zs_form" id="zs_form" method="post" action="zhaoshang_ok.php" onsubmit="return checkinfo()">
<div id="zhaoshang">
	<div class="zhaoshang_bg"></div>
	<div id="table">
		<p class="please">如果你对我们感兴趣的话，请留下你的足迹，我们会在24小时之内回复您。</p>
		<input type="username" name="username" value="您的姓名" onfocus="if (value =='您的姓名'){value =''}" onblur="if (value ==''){value='您的姓名'}" />
        <input type="telphone" name="telphone" value="您的电话" onfocus="if (value =='您的电话'){value =''}" onblur="if (value ==''){value='您的电话'}" />
        <select id="jm" name="jm">
            <option value="意向加盟城市">意向加盟城市</option>
            <option value="北京">北京</option>
            <option value="上海">上海</option>
            <option value="广州">广州</option>
            <option value="深圳">深圳</option>
        </select>
        <input type="e_mail" name="e_mail" value="邮箱" onfocus="if (value =='邮箱'){value =''}" onblur="if (value ==''){value='邮箱'}" />
        <button>提交</button>
	</div>
</div>
</form>

<?php
    require_once("bottom.php")
?>

<script type="text/javascript">
function checkinfo(){
    if(zs_form.username.value=="您的姓名")
    {
        alert("用户名不能为空，请输入您的真实姓名");
        zs_form.username.focus();
        return false;
    }
    if(zs_form.username.value.length<1 || zs_form.username.value.length>6) 
    {
        alert("用户名长度不合法，请输入您的真实姓名");
        zs_form.username.focus();
        return false;
    }
    if(zs_form.telphone.value=="")
    {
        alert("联系电话不能为空");
        zs_form.telphone.focus();
        return false;
    }
    if (zs_form.telphone.value.length!=11) 
    {
        alert("联系电话长度不合法，请重新输入");
        zs_form.telphone.focus();
        return false;
    }
    var myselect=document.getElementById("jm");
    var index=myselect.selectedIndex ; 
    myselect.options[index].value;
    myselect.options[index].text;
    if(myselect.options[index].text=="意向加盟城市")
    {
        alert("请选择您意向加盟的城市");
        zs_form.jm.focus();
        return false;
    }
    if(zs_form.e_mail.value=="邮箱")
    {
        alert("邮箱不能为空");
        zs_form.e_mail.focus();
        return false;
    }
    else
    {
        for(i=0;i<zs_form.e_mail.value.length;i++)
        if(zs_form.e_mail.value.charAt(i)=='@')     break;
        if(i==zs_form.e_mail.value.length)
        {
            alert("邮箱格式不合法");
            zs_form.e_mail.focus();
            return false;
        }
        if(zs_form.e_mail.value.length<1 || zs_form.e_mail.value.length>30) 
        {
            alert("邮箱长度不合法");
            zs_form.e_mail.focus();
            return false;
        }
    }
    
}
</script>
</body>
</html>