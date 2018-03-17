<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/food.css" />
<title>食尚---热销产品</title>
</head>
<body>
<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("head.php");
	$type=$_GET["type"];
?>

<div id="food_main">
	<div id="food_bg">
		<div class="food_menu">
			<ul>
				<li><a href="caidan.php?id=<?php echo $type;?>">返回</a></li>
	            <li><a href="caidan.php?id=<?php echo $type=1;?>">中式菜品</a></li>
	            <li><a href="caidan.php?id=<?php echo $type=2;?>">各式甜点</a></li>
	            <li><a href="caidan.php?id=<?php echo $type=3;?>">日式料理</a></li>
	            <li style="border-right:none;"><a href="caidan.php?id=<?php echo $type=4;?>">饮品饮料</a></li>
        	</ul>
		</div>
	</div>

	<?php
		$food_id=$_GET["food"];
		$sql="select * from hot_product where p_id=$food_id";
		$rs=array();
		$rs=$db->get_one($sql);
	?>

	<div id="food_bk">
		<div class="food_kuang">
			<div class="food_shang">
				<img class="food_img" src="<?php echo $rs['p_image'];?>" >
				<div class="food_name"><?php echo $rs["p_name"];?></div>
				<div class="food_des"><?php echo $rs["p_description"];?></div>
			</div>

			<div class="food_xia">
				<div class="food_cook"><?php echo $rs["p_name"];?>的做法步骤</div>
				<img class="food_pic" src="<?php echo $rs['p_image'];?>">
				<div class="food_cailiao"><pre><?php echo $rs["p_cailiao"];?></pre></div>
				<div class="food_buzhou"><pre><?php echo $rs["p_buzhou"];?></pre></div>
			</div>
			
		</div>
	</div>

</div>

<?php
    require_once("bottom.php");
?>
</body>
</html>