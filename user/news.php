<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/news.css" />
<title>食尚---菜单料理</title>
<style>
</style>
</head>
<body>
<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("head.php");
?>

<div id="news_dongtai">

	<div class="news_kuang">
		<div class="dongtai_wenzi">新闻动态</div>
		<div class="linian_neirong">理念健康时尚才能脱颖而出</div>
	</div>
	
	<div id="news_bpk">
		<?php
            $ns=empty($_GET['id'])?1:$_GET['id'];               
            $rs=array();
            $sql="select * from hot_product where is_news=1 order by p_time desc";
            $rs=$db->query($sql);
            $num=$db->get_num($rs);
            $page=round($num/10);
            if($ns>=$page){
                $ns=$page;
            }
            $rs1=$db->page($sql,(10*$ns));  
            foreach ($rs1 as $news ) {
                echo "<div class='news_pick'>";
                echo "<div class='pic'><img src='".$news['p_image']."'>";
                echo "</div>";
                echo "<div class='news_right'>";
                echo "<a class='news_name' href='food.php?food=".$news['p_id']."'>".$news['p_name']."</a>";
                echo "<img src='../images/index/hr.png'>";
                if(strlen($news['p_description'])>280)
                    {
                        echo "<div id='news_description'>".substr($news['p_description'], 0,285)."...</div>";
                    }else{
                        echo "<div id='news_description'>".$news['p_description']."</div>";
                    }
                echo "</div>";
                echo "</div>";
            }
        ?>
        <div id="chakan"><a href="news.php?id=<?php echo $ns>=$page?$page:$ns+1;?>#chakan">查看更多</a></div>
	</div>
</div>


<?php
    require_once("bottom.php");
?>
</body>
</html>