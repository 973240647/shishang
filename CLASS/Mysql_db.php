<?php
	class Mysql_db
	{
		private $hostname;	//服务器地址
		private $username;	//用户名
		private $password;	//密码
		private $dbname;	//数据库名
		private $link;		//连接对象
		private $charset;	//编码
		function __construct($db_name="shishang",$pass="")
		{
			error_reporting(0);
			date_default_timezone_set("Asia/Shanghai");/*设置时间时区*/
			$this->hostname="localhost";
			$this->username="root";
			$this->password=$pass;
			$this->dbname=$db_name;
			$this->charset="utf8";	
			$this->link=mysql_connect($this->hostname,$this->username,$this->password);	//建立与数据库的连接
			mysql_select_db($this->dbname,$this->link);			
			mysql_query("set names ".$this->charset);
		}
		//执行SQL语句
		public function query($sql)
		{
			$query=mysql_query($sql,$this->link);
			if (!$query) {
				$this->dbhalt("Excute error!".$sql);
			}
			return $query;
		}

		//返回结果集数组
		public function fetch_array($query,$result_type=MYSQL_ASSOC)
		{
			return mysql_fetch_array($query,$result_type);
		}

		//获取一条记录
		public function get_one($sql,$result_type=MYSQL_ASSOC)
		{
			$query=$this->query($sql);
			$rs=mysql_fetch_array($query);
			return $rs;
		}

		//获取全部记录
		public function get_all($sql,$result_type=MYSQL_ASSOC)
		{
			$query=$this->query($sql);
			$i=0;	//控制数组下标
			$rs=array();	//rs为返回数组
			while($row=$this->fetch_array($query,$result_type))
			{
				$rs[$i++]=$row;
			}
			return $rs;
		}

		//获取全部记录(带分页的)数组
		public function page($sql,$page_size,$result_type=MYSQL_ASSOC)
		{
			@session_start();
			$query=$this->query($sql);
			$all_num=mysql_num_rows($query);	//总条数
			$page_all_num=ceil($all_num/$page_size);	//总页数
			$page=empty($_GET["page"])?1:$_GET["page"];		//当前页数
			$page=(int)$page;
			$limit_start=($page-1)*$page_size;		//记录开始数字
			$sql=$sql." limit $limit_start,$page_size";
			$query=$this->query($sql);
			$i=0;
			$rs=array();
			while($row=$this->fetch_array($query,$result_type))
			{
				$rs[$i++]=$row;
			}
			$_SESSION["page_all_num"]=$page_all_num;
			$_SESSION["pre"]=$page<=1?1:$page-1;
			$_SESSION["next"]=$page>=$page_all_num?$page_all_num:$page+1;
			return $rs;
		}

		//获取记录条数
		public function get_num($result)
		{
			$num=@mysql_num_rows($result);
			return $num;
		}

		//更新
		public function update($sql)
		{
			if(empty($sql))
			{
				$this->dbhalt("SQL statement can not empty");
				return false;
			}
			else
			{
				$n=$this->query($sql);
				$affected_rows=mysql_affected_rows($this->link);	
				//对数据库的影响行数
				return $affected_rows;
			}
		}

		public function insert($sql){
			if(empty($sql)){
				$this->dbhalt("SQL statement can not empty");
				return false;
			}else{
				$n=$this->query($sql);
				$insert_id=mysql_insert_id($this->link);	//对数据库的影响行数
				return $insert_id;
			}
		}

		public function delete($sql){
			if(empty($sql)){
				$this->dbhalt("SQL statement can not empty");
				return false;
			}else{
				$n=$this->query($sql);
				$affected_rows=mysql_affected_rows($this->link);	//对数据库的影响行数
				return $affected_rows;
			}
		}

		//输出错误信息
		public function dbhalt($msg)
		{
			$msg=$msg."\r\n".mysql_error();
			die($msg);
		}

	}
?>