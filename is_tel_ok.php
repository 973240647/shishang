<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
    $check=$_POST["check"];
	for($i=0;$i<count($check);$i++)
	{
		$sql="update join_investment set is_tel='是' where name='$check[$i]' ";
		$affected_row=$db->update($sql);
	}
	if($affected_row>0)
	{
		echo "<script language='javascript'>";
		echo "alert('操作成功');";
		echo "window.location.href='backstage.php' ";
		echo "</script>";
	}else{
		echo "<script language='javascript'>";
		echo "alert('操作失败');";
		echo "window.location.href='backstage.php' ";
		echo "</script>";
	}
?>