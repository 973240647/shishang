<div id="back_m">
	<div id="back_nav">
		<div class="back_dh">
			<ul class="big_B">
				<li><a class="big_a" href="../user/index.php">网站首页</a></li>
				<li><a class="big_a" href="../admin/backstage.php">加盟列表</a></li>
				<li><a class="big_a" href="../admin/news_fabu.php">动态发布</a></li>
				<li><a class="big_a" href="../admin/product_fabu.php">产品发布</a></li>
				<li><a class="big_a" href="../admin/manager.php">管理</a></li>
				<li><a class="big_a" href="../admin/recive_pro.php">回收站</a></li>
			</ul>
		</div>
		
		<div id="admin">
			管理员:
			<?php 
				session_start();
				echo $_SESSION["user"];
			?>
			<p class="p_quit"><a class="quit" href="quit.php">退出登录</a></p>	
		</div>
		

	</div>
</div>


