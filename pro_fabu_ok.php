<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	include("../CLASS/Mysql_db.php");
	include("../CLASS/fileupload.php");
	$p_type=$_POST["pro_type"];
	$p_name=$_POST["pro_name"];
	$p_des=$_POST["pro_des"];
	$p_time=date("Y-m-d H:i:s");
	$sql="select * from menu_type where type_name='$p_type' ";
	$db=new Mysql_db("shishang","");
	$rs=$db->get_one($sql);
	if($_FILES["pro_pic"]["name"])
	{
		$up=new fileupload();
		$up->set("path","../images/product/");
		$up->set("allowtype",array("jpg","gif","png","jpeg"));
		$up->set("maxsize",200000);
		$up->set("israndname",true);
		if($up->upload("pro_pic"))
		{
			$f=$up->getFileName();
			$sql2="insert into hot_product(p_type,p_name,p_image,p_description,p_time) values('".$rs["type_id"]."','$p_name','../images/product/$f','$p_des','$p_time')";
		}else{
			echo "<pre>";
			echo var_dump($up->getErrorMsg());
			echo "</pre>";
		}
	}
    $n=$db->insert($sql2);
    if($n>0)
    {
    	echo "<script language='javascript'>";
		echo "alert('产品发布成功');";
		echo "window.location.href='backstage.php' ";
		echo "</script>";
    }else{
    	echo "<script language='javascript'>";
		echo "alert('产品发布失败');";
		echo "window.location.href='backstage.php' ";
		echo "</script>";
    }
?>