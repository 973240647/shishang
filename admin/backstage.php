<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/backstage.css" />
<script type="text/javascript" src="../JS/jquery.min.js"></script>
<title>食尚--加盟申请</title>
</head>
<body>

<form name="apply_list" id="apply_list" method="post" >
<div id="back_bg">

<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("../admin/head2.php");
?>
	<p class="apply_list">加盟申请列表</p>
	<table class="admin_table" cellpadding="0" cellspacing="0">
		<tr>
			<td class="xuankuang"><input name="all"  type="checkbox"  value="全选"  onclick="selectAll(document.apply_list)"></td>
			<td class="name">用户名</td>
			<td class="phone">联系电话</td>
			<td class="address">加盟地址</td>
			<td class="email">邮箱</td>
			<td class="time">申请时间</td>
			<td>是否联系</td>
			<td>是否加盟</td>
		</tr>

		<?php
			$rs=array();
			$sql="select * from join_investment order by apply_time desc";
            $result=$db->page($sql,3);
            foreach ($result as $rs) {
            	echo "<tr>";
				echo "<td class='xuankuang'><input class='checkbox' type='checkbox' name='check[]' value='".$rs["name"]."'></td>";
				echo "<td class='name'>".$rs["name"]."</td>";
				echo "<td class='phone'>".$rs["telphone"]."</td>";
				echo "<td class='address'>".$rs["address"]."</td>";
				echo "<td class='email'>".$rs["email"]."</td>";
				echo "<td class='time'>".$rs["apply_time"]."</td>";
				echo "<td>".$rs["is_tel"]."</td>";
				echo "<td>".$rs["is_join"]."</td>";
				echo "</tr>";
            }
		?>
		
		<tr>
			<td colspan="8"><button type='submit' onclick="sure_tel()">确认联系</button><button type='submit' onclick="sure_join()">确认加盟</button><button type='submit' onclick="false_join()">未加盟</button></td>
		</tr>

		<tr>
			<td colspan="8" class="page">
				<a href="?page=1">首页</a>
				<a href="?page=<?php echo $_SESSION['pre'];?>">上一页</a>
				<a href="?page=<?php echo $_SESSION['next'];?>">下一页</a>
				<a href="?page=<?php echo $_SESSION['page_all_num'];?>">尾页</a>
			</td>
		</tr>
	</table>
</div>
</form>
<?php
    require_once("../user/bottom.php");
?>
<script> 
function  selectAll(obj)  
{  
	for(var i=0;i<4;i++){
		if(obj.elements[i].type  ==  "checkbox")  
		{  
			if(!obj.elements[i].checked)  
				obj.elements[i].checked  =  true;  
			else  
				obj.elements[i].checked  =  false;  
		}
	}  
}
function sure_tel()  
{  
document.apply_list.action="is_tel_ok.php";    
}  
function sure_join()  
{  
document.apply_list.action="is_join_ok.php";  
} 
function false_join()
{
document.apply_list.action="false_join_ok.php";  	
}
 </script>
}
</body>
</html>