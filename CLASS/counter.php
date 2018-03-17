<?php
	function Counter(){
		$c="rec.txt";	//存放访问数量
		if(!file_exists($c))
		{
			$fp=fopen($c, "w");
			$num=1;
			fputs($fp,$num);
			fclose($fp);
		}
		else{	//读取文件内容 +1 写回文件
			$fp=fopen($c,"r");
			$num=fgets($fp);
			$num=$num+1;
			fclose($fp);
			$fp=fopen($c,"w");
			fputs($fp,$num);
			fclose($fp);
		}
		return $num;
	}
?>