<div id="top">
	<div id="logo"></div>
	<div id="nav">
		<div class="daohang">
			<ul class="big_u">
				<li><a class="big_a" href="index.php">首页</a></li>
				<li><a class="big_a" href="pinpai_story.php">品牌故事</a></li>
				<li>
					<a class="big_a" href="caidan.php">菜单料理</a>
					<div class="menu_div">
						<a href="caidan.php?id=<?php echo $type=1;?>" class="menu_a">中式菜品</a>
						<a href="caidan.php?id=<?php echo $type=2;?>" class="menu_a">各式甜点</a>
						<a href="caidan.php?id=<?php echo $type=3;?>" class="menu_a">日式料理</a>
					</div>	
				</li>
				<li>
					<a class="big_a" href="hot_product.php">热销产品</a>
					<div class="product_div">
						<a href="hot_product.php?id=<?php echo $type=1;?>" class="product_a">中式菜品</a>
						<a href="hot_product.php?id=<?php echo $type=2;?>" class="product_a">各式甜点</a>
						<a href="hot_product.php?id=<?php echo $type=3;?>" class="product_a">日式料理</a>
						<a href="hot_product.php?id=<?php echo $type=4;?>" class="product_a">饮料饮品</a>
					</div>
				</li>
				<li><a class="big_a" href="news.php">新闻动态</a></li>
				<li><a class="big_a" href="zhaoshang.php">招商加盟</a></li>
				<li><a class="big_a" href="
				<?php
					session_start();
					if(empty($_SESSION["user"]))
					{
						echo "../admin/backlogin.php";
					}else{
						echo "../admin/backstage.php";
					}
				?>">后台管理</a></li>
				<li><a class="big_a" href="lianxi.php" style="border-right:none;">联系我们</a></li>
			</ul>
		</div>

		<div id="search">
			<div class="search_big_div">
				<div class="search_div">
					<input type="search" name="search">
					<a href="#">搜索</a>
				</div>
			</div>
		</div>
	</div>
</div>


