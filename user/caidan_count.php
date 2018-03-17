<?php
header("Content-Type:text/html;charset=utf-8");
	include("../CLASS/Mysql_db.php");
	$db=new Mysql_db("shishang","");
	$type=$_GET["type"];
	$food=$_GET["food"];
	$rs=array();
	$rs=$db->get_one("select * from hot_product where p_id='$food' ");
	$count=$rs['p_count']+1;
	if(mysql_affected_rows()>0)
	{
		$affected_rows=$db->update("update hot_product set p_count='$count' where p_id='$food' ");
		echo "$affected_rows";
		if($affected_rows>0)
		{
			echo "<script language='javascript'> ";
			echo "window.location.href='food.php?type=$type&food=$food'; ";
			echo "</script>";
		}
	}
?>