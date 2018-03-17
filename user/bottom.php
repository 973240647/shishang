<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	#bottom{
		width: 100%;
		height: 115px;
		float: left;
		background: #8FC78F;
	}
	.bottom_con{
		width: 50%;
		height: 50%;
		position: relative;
		margin: auto;
		margin-top: 2%;
	}
	.bottom_con p{
		font-size: 16px;
		color: #1C7464;
		font-weight: bold;
		letter-spacing: 2px;
		display: flex; 
  		justify-content: center; 
  		align-items: center;
  		margin: 6px;
	}
</style>
</head>
<?php
	require_once("../CLASS/counter.php");
?>
<div id="bottom">
	<div class="bottom_con">
		<p>请在屏幕分辨率为1600*900的电脑上查看</p>
		<p>我的网站&nbsp;15计应班第六组</p>
		<p>您是第<?php echo Counter();?>位访客</p>
	</div>
</div>