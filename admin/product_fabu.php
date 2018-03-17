<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/backstage.css" />
<link rel="stylesheet" type="text/css" href="../CSS/fabu.css">
<script type="text/javascript" src="../JS/jquery.min.js"></script>
<title>食尚--产品发布</title>
</head>
<body>

	<div id="back_bg">
	<?php
	    include("../CLASS/Mysql_db.php");
	    $db=new Mysql_db("shishang","");
		require_once("../admin/head2.php");
	?>

	<form id="pro_fabu" name="pro_fabu" method="post" action="pro_fabu_ok.php" onsubmit="return checkinfo()"  enctype="multipart/form-data">
		<table class="news_table" cellspacing="0" cellpadding="0">
			<tr>
		    	<td class="word" colspan="3">发布产品</td>
		    </tr>
		    
		    <tr>
		    	<td class="word">产品类型：</td>
		        <td>
		        <select name="pro_type" id="pro_type">
		        	<option selected="selected">-产品类型-</option>
			            <?php
			            	$rs=array();
			            	$sql="select * from menu_type";
			            	$rs=$db->query($sql);
			            	while($result=$db->fetch_array($rs))
			            	{
							?>
							<option><?php echo $result['type_name'];?></option>
							<?php } ?>
		        </select></td>       
		    </tr>
		    
		    <tr>
		    	<td class="word">产品名称：</td>
		        <td><input name="pro_name" type="text" id="pro_name" /></td>
		    </tr>
		    
		    <tr>
		    	<td class="word" height="50">产品图片：</td>
		        <td>
		        	<img id="preview" />
				    <br />
				    <input type="file" name="file" onchange="imgPreview(this)" /> 
				</td>
		    </tr>
		    
		    <tr>
		    	<td class="word">产品描述：</td>
		        <td><textarea name="pro_des" id="pro_des"></textarea></td>
		    </tr>
		    
		    <tr height="40">
		    	<td colspan="2"><button type="submit">添加</button><button type="reset">重置</button></td>
		    </tr>
		</table>
	</form>
</div>

<?php
    require_once("../user/bottom.php");
?>
<script type="text/javascript">
function checkinfo(){
	var myselect=document.getElementById("pro_type");
    var index=myselect.selectedIndex ; 
    myselect.options[index].value;
    myselect.options[index].text;
    if(myselect.options[index].text=="-产品类型-")
    {
        alert("请选择所发布的产品类型");
        pro_fabu.pro_type.focus();
        return false;
    }
    if(pro_fabu.pro_name.value=="")
    {
        alert("产品名称不能为空");
        pro_fabu.pro_name.focus();
        return false;
    }
    if(pro_fabu.pro_pic.value=="")
    {
        alert("请选择产品图片");
        pro_fabu.pro_pic.focus();
        return false;
    }
}
	
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


