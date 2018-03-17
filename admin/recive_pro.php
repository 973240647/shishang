<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/backstage.css" />
<link rel="stylesheet" type="text/css" href="../CSS/manager.css">
<script type="text/javascript" src="../JS/jquery.min.js"></script>
<title>食尚--管理</title>
</head>
<body>

<div id="back_bg">
	<?php
	    include("../CLASS/Mysql_db.php");
	    $db=new Mysql_db("shishang","");
		require_once("../admin/head2.php");
	?>

<form name="recive_pro" id="recive_pro" method="post" >
	<table id="cont" cellspacing="0" cellpadding="0">
		<tr>
			<td class="k"><input name="all"  type="checkbox"  value="全选"  onclick="selectAll(document.recive_pro)"></td>
			<td class="title">标题</td>
			<td class="view">访问量</td>
			<td class="time">更新日期</td>
			<td class="zhuangtai">状态</td>
		</tr>

		<?php
			$rs=array();
			$sql="select * from recive_pro order by p_time desc";
            $result=$db->page($sql,8);
            foreach ($result as $rs) {
            	echo "<tr>";
				echo "<td><input class='checkbox' type='checkbox' name='check[]' value='".$rs["p_name"]."'></td>";
				echo "<td>".$rs["p_name"]."</td>";
				echo "<td>".$rs["p_count"]."</td>";
				echo "<td>".$rs["p_time"]."</td>";
				echo "<td>";
				if($rs["is_news"]==1)	echo "新闻动态";
				else	echo "产品";
				echo "</td>";
				echo "</tr>";
            }
		?>

		<tr>
			<td colspan="6"><button type='submit' onclick="huifu()">恢复</button><button type='submit' onclick="abso_delete()">彻底删除</button></td>
		</tr>

		<tr>
			<td colspan="6">
				<a href="?page=<?php echo $_SESSION['pre'];?>">上一页</a>
				<?php
					for($i=1;$i<=$_SESSION['page_all_num'];$i++)
					{
						echo "<a class='page' href='?page=$i'>".$i."</a>";
					}
				?>
				<a href="?page=<?php echo $_SESSION['next'];?>">下一页</a>
			</td>
		</tr>

	</table>
</form>
</div>

<?php
    require_once("../user/bottom.php");
?>
<script> 
function  selectAll(obj)  
{  
	for(var i=0;i<9;i++){
		if(obj.elements[i].type  ==  "checkbox")  
		{  
			if(!obj.elements[i].checked)  
				obj.elements[i].checked  =  true;  
			else  
				obj.elements[i].checked  =  false;  
		}
	}  
}
function huifu()  
{  
document.recive_pro.action="huifu_ok.php";    
}  
function abso_delete()  
{  
document.recive_pro.action="recive_delete.php";  
} 
 </script>
</body>
</html>