<?php
	header("Content-Type:text/html;charset=utf-8");
	require_once("../CLASS/jm_list.php");
	$apply=new jm_list($_POST["username"],$_POST["telphone"],$_POST["jm"],$_POST["e_mail"]);
	if($apply->isApply())
	{
		echo "<script language='javascript'> ";
		echo "alert('您已提交过加盟申请，请耐心等待回复');";
		echo "window.location.href='zhaoshang.php'; ";
		echo "</script>";
	}else{
		$n=$apply->dojoin();
		if($n>0)
		{
			echo "<script language='javascript'> ";
			echo "alert('申请提交成功');";
			echo "window.location.href='send.php?id=".$_POST['username']."'; ";
			echo "</script>";
		}else{
			echo "<script language='javascript'> ";
			echo "alert('申请提交失败');";
			echo "window.location.href='zhaoshang.php'; ";
			echo "</script>";
		}
	}

?>