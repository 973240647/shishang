<?php
	header("Content-Type:text/html;charset=utf-8");
	include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
    $check=$_POST["check"];
    $rs=array();
	for($i=0;$i<count($check);$i++)
	{
		$sql="select * from hot_product where p_name='$check[$i]' ";
		$rs=$db->get_one($sql);
		$sql2="insert into recive_pro(p_type,p_name,p_image,p_description,is_news,p_cailiao,p_buzhou,p_count,p_time) values('".$rs["p_type"]."','".$rs["p_name"]."','".$rs["p_image"]."','".$rs["p_description"]."','".$rs["is_news"]."','".$rs["p_cailiao"]."','".$rs["p_buzhou"]."','".$rs["p_count"]."','".$rs["p_time"]."')";
		$rs1=$db->insert($sql2);
		if($rs1>0)
		{	
			$sql3="delete from hot_product where p_name='$check[$i]' ";
			$affected_row=$db->delete($sql3);
			if ($affected_row>0) {
				echo "<script language='javascript'>";
				echo "alert('完成');";
				echo "window.location.href='recive_pro.php';";
				echo "</script>";
			}
			else
			{
				echo "<script language='javascript'>";
				echo "alert('失败');";
				echo "window.location.href='manager.php';";
				echo "</script>";
			}
		}else{
		echo "<script language='javascript'>";
		echo "alert('失败');";
		echo "window.location.href='manager.php';";
		echo "</script>";
		}
	}
	
	
?>