<?php
	header("Content-Type:text/html;charset=utf-8");
	session_start();
	include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
    $id=$_GET["id"];
    $name=$_POST["set_name"];
    $p_type=$_POST["leixing"];
    $p_leibie=$_POST["leibie"];
    if($p_leibie=='新闻动态') 	$is_new=1;
    else 	$is_new=0;
    $p_des=$_POST["miaoshu"];
    $p_cailiao=$_POST["caoliao"];
    $p_buzhou=$_POST["buzhou"];
    $p_time=date("Y-m-d H:i:s");
    $sql="select * from hot_product,menu_type where p_id=$id and type_name='$p_type' ";
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
			$sql2="update hot_product set p_type='".$rs["type_id"]."',p_name='$name',p_image='../images/product/$f',p_description='$p_des',is_news='$is_new',p_cailiao='$p_cailiao',p_buzhou='$p_buzhou',p_time='$p_time') ";
		}else{
			echo "<pre>";
			echo var_dump($up->getErrorMsg());
			echo "</pre>";
		}
	}else{
		$sql2="update hot_product set p_type=".$rs["type_id"].",p_name='$name',p_description='$p_des',is_news='$is_new',p_cailiao='$p_cailiao',p_buzhou='$p_buzhou',p_time='$p_time' where p_id=$id ";
	}
	$n=$db->update($sql2);
    if($n>0)
    {
    	echo "<script language='javascript'>";
		echo "alert('修改成功');";
		echo "window.location.href='manager.php' ";
		echo "</script>";
    }else{
    	echo "<script language='javascript'>";
		echo "alert('修改失败');";
		echo "window.location.href='manager.php' ";
		echo "</script>";
    }
?>