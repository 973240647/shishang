<?php
	header("Content-Type:text/html;charset=utf-8");
	require_once("../CLASS/Mysql_db.php");
	require_once("../CLASS/Smtp.php");
	$smtpserver="smtp.163.com";
	$smtpserverport=25;
	$smtpuser="S973240647@163.com";
	$smtppass="440Never";
	$smtp=new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$u=$_GET["id"];	
	$sql="select * from join_investment where name='$u' ";
	$db=new Mysql_db();
	$rs=$db->get_one($sql);
	$to=$rs["email"];
	$mailtitle="食尚加盟";
	$mailcontent="亲爱的用户".$u.",我们已收到您的加盟申请，将在2-3个工作日内与您联系，请尽量保持您的手机畅通";
	$mailtype="HTML";
	$state=$smtp->sendmail($to,$smtpuser,$mailtitle,$mailcontent,$mailtype);
	if($state)
	{
		echo "<script language='javascript'>";
		echo "window.location.href='index.php#jiameng'; ";
		echo "</script>";
	}else{
		echo "<script language='javascript'>";
		echo "alert('对不起，邮件发送失败');";
		echo "window.location.href='zhaoshang.php#zhaoshang'; ";
		echo "</script>";
	}
?>