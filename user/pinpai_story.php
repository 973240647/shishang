<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="../CSS/head.css" />
<link rel="stylesheet" type="text/css" href="../CSS/pinpai_story.css" />
<link href="../CSS/css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="../CSS/normalize.css">

        <link rel="stylesheet" type="text/css" href="../CSS/demo.css">

        <link rel="stylesheet" type="text/css" href="../CSS/set2.css">

        <link rel="stylesheet" type="text/css" href="../CSS/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/demoadpacks.css">
<title>食尚</title>
</head>
<body>
<?php
    include("../CLASS/Mysql_db.php");
    $db=new Mysql_db("shishang","");
	require_once("head.php");
?>

<div id="pinpai_main">
	<div class="b_pic"><p class="b_name">品牌故事</p></div>
	<div class="more"><p>品牌故事&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;招商加盟&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联系我们</p></div>

	<div id="guanyu">
		<div class="guanyu_main">
			<div class="main_left"></div>
			<div class="main_right">
				<p class="me">关于我们</p>
				<p class="hope" style="margin-top:18%; margin-left:2%;"	>食尚健康食品，希望带着“分享优质食材”的坚持。</p>
				<p class="hope" style="margin-top:5%;margin-left:12%;">为人们提供一口感动舌尖的美味，更为增添一份撼动心灵的人情。</p>
				<p class="hope" style="margin-left:25%;">一份菜品、一口美味，都是生活的酸甜苦辣。</p>
				<p class="hope" style="margin-top:12%;margin-left:31%;">健康食品，创造菜品美味和情味！</p>
				<p class="hope" style="margin-left:37%;">在好吃之上，更讲求营养</p>
				<p class="hope" style="margin-left:37%;">在好看之上，更在乎健康</p>
				<p class="hope" style="margin-left:33%;">在服务之上，更注重可持续发展</p>
				<p class="hope" style="margin-left:19%;">不玩噱头，不谈情怀，做的就是关心顾客最本质的需求</p>
				<p class="hope" style="margin-left:36%;">这就是食尚美味的人情味所在</p>
			</div>
		</div>
	</div>

	<div id="fin">
		<div class="tu_kuang">
			<div class="grid">
				<div class="one">
					<figure class="effect-story">
						<img src="../images/pinpai/1.jpg">
						<figcaption></figcaption>
					</figure>
				</div>

				<div class="one">
					<figure class="effect-story">
						<img src="../images/pinpai/2.jpg">
						<figcaption></figcaption>
					</figure>
				</div>

				<div class="one">
					<figure class="effect-story">
						<img src="../images/pinpai/3.jpg">
						<figcaption></figcaption>
					</figure>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
    require_once("bottom.php")
?>
</body>
</html>