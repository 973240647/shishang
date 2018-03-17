<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/hot_product.css" />
<title>食尚---热销产品</title>
</head>
<body>
<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("head.php");
?>

<div id="hot_main">
	<div class="hot_bg"></div>

	<div id="hot_con">
        <div class="h_name">
            <p class="h_pro">热销产品</p>
            <p class="need">在好吃之上 更讲求营养 关心顾客最本质的需求</p>
            <div class="hot_menu">
                <ul>
                    <li><a href="hot_product.php?id=<?php echo $type=1;?>#hot_con">中式菜品</a></li>
                    <li><a href="hot_product.php?id=<?php echo $type=2;?>#hot_con">各式甜点</a></li>
                    <li><a href="hot_product.php?id=<?php echo $type=3;?>#hot_con">日式料理</a></li>
                    <li style="border-right:none;"><a href="hot_product.php?id=<?php echo $type=4;?>#hot_con">饮品饮料</a></li>
                </ul>
            </div>
        </div>
        
            <div id="hot_kuang">
                <?php  
                    $tp=$_GET["id"];
                    switch ($tp)
                    {
                        case 1:
                          $sql="select * from hot_product where p_type=1 order by p_count desc";
                          break;
                        case 2:
                          $sql="select * from hot_product where p_type=2 order by p_count desc";
                          break;
                        case 3:
                          $sql="select * from hot_product where p_type=3 order by p_count desc";
                          break;
                        case 4:
                          $sql="select * from hot_product where p_type=4 order by p_count desc";
                          break;
                        default:
                          $sql="select * from hot_product order by p_count desc";
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
                        echo "<div class='h_pic'><img src='".$pro['p_image']."'>";
                        echo "<div class='h_zhe'><a href='caidan_count.php?type=$tp&food=".$pro['p_id']."&count=".$pro["p_count"]."'>".$pro['p_name']."</a></div>";
                        echo "</div>";
                    }
                ?>
            </div>

            <div id="hj"><a href="<?php 
                $pg=$jz>=$page?$page:$jz+1;
                if($tp){
                    echo "hot_product.php?id=$tp&jz=$pg#hj ";           
                }else{
                    echo "hot_product.php?jz=$pg#hj ";           
                } ?>" >加载更多</a>
            </div>         
    </div>
</div>

<?php
    require_once("bottom.php");
?>
</body>
</html>