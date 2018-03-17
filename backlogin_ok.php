<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	include("../CLASS/Mysql_db.php");
	$db=new Mysql_db("shishang","");
	$ad_name=$_POST["adminname"];
	$ad_pass=$_POST["password"];
	$sql="select * from admin where admin_name='$ad_name' and admin_pass='$ad_pass' ";
	$rs=array();
	$rs=$db->get_one($sql);
	if($rs>0)
	{
		echo "<script language='javascript'> ";
		echo "alert('登陆成功');";
		echo "window.location.href='backstage.php'; ";
		echo "</script>";
		$_SESSION["user"]=$rs["admin_name"];
	}else{
		echo "<script language='javascript'> ";
		echo "alert('用户名或密码错误');";
		echo "window.location.href='backlogin.php'; ";
		echo "</script>";
	}
?>