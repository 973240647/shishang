<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/backstage.css" />
<link rel="stylesheet" type="text/css" href="../CSS/manager.css">
<link rel="stylesheet" type="text/css" href="../CSS/fabu.css">
<title>食尚--编辑</title>
</head>
<body>

<div id="back_bg">
	<?php
		session_start();
	    include("../CLASS/Mysql_db.php");
	    $db=new Mysql_db("shishang","");
		require_once("../admin/head2.php");
    	$p_name=$_GET["id"];
    	$p_type=$_GET["type"];
		$rs=array();
		$sql="select * from hot_product,menu_type where hot_product.p_name='$p_name' and menu_type.type_id='$p_type' ";
		$rs=$db->get_one($sql);	
	?>

<form name="set" id="set" method="post" action="set_ok.php?id=<?php echo $rs["p_id"];?>">
	<table class="set" cellspacing="0" cellpadding="0">
			<tr>
		    	<td class="setword">名称：</td>
		    	<td><input type="text" name="set_name" value="<?php echo $rs['p_name'];?>"></td>
		    </tr>
		    
		    <tr>
		    	<td class="word">类型：</td>
		        <td>
		        <select name="leixing" id="leixing">
		        	<option selected="selected"><?php echo $rs['type_name'];?></option>
			            <?php
			            	$sql2="select * from menu_type";
							$rs1=$db->query($sql2);
			            	while($result=$db->fetch_array($rs1))
			            	{
							?>
							<option><?php echo $result['type_name'];?></option>
							<?php } ?>
		        </select></td>       
		    </tr>

		    <tr>
				<td class="word">类别：</td>
				<td>
				<select name="leibie" id="leibie">
		        	<option selected="selected"><?php if($rs["is_news"]==1) echo "新闻动态";
					else echo "产品";?></option>
			        <option><?php if($rs["is_news"]==1) echo "产品";
					else echo "新闻动态";?></option>	
		        </select></td>
		    </tr>
		    
		    <tr>
		    	<td class="word" height="50">图片：</td>
		        <td>
		        	<img src="<?php echo $rs["p_image"];?>">
		        	<img id="preview" />
				    <br />
				    <input type="file" name="file" onchange="imgPreview(this)" /> 
				</td>
		    </tr>
		    
		    <tr>
		    	<td class="word">描述：</td>
		        <td><textarea name="miaoshu" id="miaoshu"><?php echo $rs["p_description"];?></textarea></td>
		    </tr>

		    <tr>
		    	<td class="word">材料：</td>
		        <td><textarea name="caoliao" id="caoliao"><?php echo $rs["p_cailiao"];?></textarea></td>
		    </tr>

		    <tr>
		    	<td class="word">料理步骤：</td>
		        <td><textarea name="buzhou" id="buzhou"><?php echo $rs["p_buzhou"];?></textarea></td>
		    </tr>

		    <tr>
		    	<td class="word">点击次数：</td>
		        <td><input type="text" readonly="value" name="count" value="<?php echo $rs["p_count"];?>"></td>
		    </tr>

		    <tr>
				<td class="word">发布时间：</td>
				<td><input type="text" readonly="value" name="count" value="<?php echo $rs["p_time"];?>"></td>
		    </tr>
		    
		    <tr height="40">
		    	<td colspan="2"><button type="submit">修改</button></td>
		    </tr>
		</table>
</form>
</div>

<?php
    require_once("../user/bottom.php");
?>  
<script type="text/javascript">
function imgPreview(fileDom){
    //判断是否支持FileReader
    if (window.FileReader) {            
    	var reader = new FileReader();
    } else {
        alert("您的设备不支持图片预览功能，如需该功能请升级您的设备！");
    }        //获取文件
    var file = fileDom.files[0];        
    var imageType = /^image\//;        //是否是图片
    if (!imageType.test(file.type)) {
        alert("请选择图片！");            return;
    }        //读取完成
    reader.onload = function(e) {
        //获取图片dom
        var img = document.getElementById("preview");            //图片路径设置为读取的图片
        img.src = e.target.result;
    };
    reader.readAsDataURL(file);
}
</script>
</body>
</html>