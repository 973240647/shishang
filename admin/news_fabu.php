<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/backstage.css" />
<link rel="stylesheet" type="text/css" href="../CSS/fabu.css">
<script type="text/javascript" src="../JS/jquery.min.js"></script>
<title>食尚--动态发布</title>
</head>
<body>

	<div id="back_bg">
	<?php
	    include("../CLASS/Mysql_db.php");
	    $db=new Mysql_db("shishang","");
		require_once("../admin/head2.php");
	?>

	<form id="news_fabu" name="news_fabu" method="post" action="news_fabu_ok.php" onsubmit="return checkinfo()"  enctype="multipart/form-data">
		<table class="news_table" cellspacing="0" cellpadding="0">
			<tr>
		    	<td class="word" colspan="3">发布动态</td>
		    </tr>
		    
		    <tr>
		    	<td class="word">动态类型：</td>
		        <td colspan="2">
		        <select name="news_type" id="news_type">
		        	<option selected="selected">-动态类型-</option>
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
		    	<td class="word">动态标题：</td>
		        <td colspan="2"><input name="news_title" type="text" id="news_title" /></td>
		    </tr>
		    
		    <tr>
		    	<td class="word" height="50">动态图片：</td>
		        <td colspan="2"><input name="news_img" type="file" id="news_img" /></td>
		    </tr>
		    
		    <tr>
		    	<td class="word">动态描述：</td>
		        <td colspan="2"><textarea name="news_des" id="news_des"></textarea></td>
		    </tr>

		    <tr>
		    	<td class="word">需要材料：</td>
		        <td colspan="2"><textarea name="news_caoliao" id="news_caoliao"></textarea></td>
		    </tr>

		    <tr>
		    	<td class="word">制作步骤：</td>
		        <td colspan="2"><textarea name="news_buzhou" id="news_buzhou"></textarea></td>
		    </tr>
		    
		    <tr height="40">
		    	<td colspan="3"><button type="submit">添加</button><button type="reset">重置</button></td>
		    </tr>
		</table>
	</form>
</div>

<?php
    require_once("../user/bottom.php");
?>
<script type="text/javascript">
function checkinfo(){
	var myselect=document.getElementById("news_type");
    var index=myselect.selectedIndex ; 
    myselect.options[index].value;
    myselect.options[index].text;
    if(myselect.options[index].text=="-动态类型-")
    {
        alert("请选择所发布的动态类型");
        news_fabu.news_type.focus();
        return false;
    }
    if(news_fabu.news_title.value=="")
    {
        alert("标题不能为空");
        news_fabu.news_title.focus();
        return false;
    }
    if(news_fabu.news_img.value=="")
    {
        alert("请选择图片");
        news_fabu.news_img.focus();
        return false;
    }
    if(news_fabu.news_caoliao.value=="")
    {
        alert("请输入所需材料");
        news_fabu.news_caoliao.focus();
        return false;
    }
    if(news_fabu.news_buzhou.value=="")
    {
        alert("制作步骤不能为空");
        news_fabu.news_buzhou.focus();
        return false;
    }
}
</script>
</body>
</html>


