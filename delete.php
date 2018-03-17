<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
    $check=$_POST["check"];
	for($i=0;$i<count($check);$i++)
	{
		$sql="delete from hot_product where p_name='$check[$i]' ";
		$affected_row=$db->delete($sql);
	}
	if($affected_row>0)
	{	
		echo "<script language='javascript'>";
		echo "alert('删除成功');";
		echo "window.location.href='manager.php';";
		echo "</script>";
	}
	else
	{
		echo "<script language='javascript'>";
		echo "alert('删除失败');";
		echo "window.location.href='manager.php';";
		echo "</script>";
	}
?>
