<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/caidan.css" />
<link href="../CSS/css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../CSS/normalize.css">

        <link rel="stylesheet" type="text/css" href="../CSS/demo.css">

        <link rel="stylesheet" type="text/css" href="../CSS/set2.css">

        <link rel="stylesheet" type="text/css" href="../CSS/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/demoadpacks.css">
<title>食尚---菜单料理</title>
</head>
<body>
<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("head.php");
?>

<div id="caidan_menu">
	<div class="caidan_co">
        <ul>
            <li><a href="caidan.php?id=<?php echo $type=1;?>">中式菜品</a></li>
            <li><a href="caidan.php?id=<?php echo $type=2;?>">各式甜点</a></li>
            <li><a href="caidan.php?id=<?php echo $type=3;?>">日式料理</a></li>
            <li style="border-right:none;"><a href="caidan.php?id=<?php echo $type=4;?>">饮品饮料</a></li>
        </ul>
    </div>
	
	<div id="big_k">
		<div id="caidan_kuang">
		    <?php                
                $tp=$_GET["id"];
                switch ($tp)
                {
                    case 1:
                      $sql="select * from hot_product where p_type=1 order by p_time desc";
                      break;
                    case 2:
                      $sql="select * from hot_product where p_type=2 order by p_time desc";
                      break;
                    case 3:
                      $sql="select * from hot_product where p_type=3 order by p_time desc";
                      break;
                    case 4:
                      $sql="select * from hot_product where p_type=4 order by p_time desc";
                      break;
                    default:
                      $sql="select * from hot_product order by p_time desc";
                }
                $jz=empty($_GET["jz"])?1:$_GET["jz"];                  
                $rs=array();
                $rs=$db->query($sql);
                $num=$db->get_num($rs);
                if($num>0 && $num<8){
                    $page=1;
                }else{
                    $page=ceil($num/8);//总页数
                }               
                if($jz>=$page){
                    $jz=$page;
                }
                $rs1=$db->page($sql,(8*$jz));
	          	foreach ($rs1 as $pro) {
	              	echo "<div class='caidan_pic'><div class='grid'>";
	              	echo "<a href='caidan_count.php?type=$tp&food=".$pro['p_id']."'>";
	              	echo "<figure class='effect-apollo'>";
	              	echo "<img src='".$pro['p_image']."'>";
	              	echo "<figcaption>";
	              	echo "<div class='pic_zhe'><a class='ca'>".$pro['p_name']."</a></div>";
	              	echo "</figcaption></a>";
	              	echo "</div>";
	              	echo "</div>";
	          	}
	      	?>
	   	</div>
	   	<div id="jiazai"><a id="jz" href="<?php 
            $pg=$jz>=$page?$page:$jz+1;
            if($tp){
                echo "caidan.php?id=$tp&jz=$pg#jiazai ";           
            }else{
                echo "caidan.php?jz=$pg#jiazai ";           
            } ?>" >加载更多</a>
        </div>
	</div>    
</div>

<?php
    require_once("bottom.php");
?>
</body>
</html>