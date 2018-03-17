<?php
	/*错误讯息回报的等级-begin*/
	$error_1=E_ERROR;
	$error_2=E_WARNING;
	$error_4=E_PARSE;
	$error_8=E_NOTICE;
	$error_16=E_CORE_ERROR;
	$error_32=E_CORE_WARNING;
	$error_64=E_COMPILE_ERROR;
	$error_128=E_COMPILE_WARNING;
	$error_256=E_USER_ERROR;
	$error_512=E_USER_WARNING;
	$error_1024=E_USER_NOTICE;
	$error_2047=E_ALL;
	$error_2048=E_STRICT;
	/*错误讯息回报的等级-end*/
	error_reporting(7);/*错误提示 1+2+4*/
	date_default_timezone_set("Asia/Shanghai");/*设置时间时区*/
/**
* 数据库操作
*/
class mysqls
{
	private $server_name;	/*服务器名称*/	
	private $server_user;	/*服务器用户名*/
	private $database_pass;	/*数据库登录密码*/
	private $database_name;	/*数据库名称*/
	private $database_link; /*数据库连接对象*/
	/*错误信息回报的等级-begin*/
	private $error_1=E_ERROR;
	private $error_2=E_WARNING;
	private $error_4=E_PARSE;
	private $error_8=E_NOTICE;
	private $error_16=E_CORE_ERROR;
	private $error_32=E_CORE_WARNING;
	private $error_64=E_COMPILE_ERROR;
	private $error_128=E_COMPILE_WARNING;
	private $error_256=E_USER_ERROR;
	private $error_512=E_USER_WARNING;
	private $error_1024=E_USER_NOTICE;
	private $error_2047=E_ALL;
	private $error_2048=E_STRICT;
	/*错误讯息回报的等级-end*/	
	function __construct($db_name='photo',$db_pass='123456',$s_name='localhost',$s_user='root')
	{	
		$this->database_name=$db_name;	/*连接的数据库名称*/
		$this->database_pass=$db_pass;	/*连接数据库的密码*/
		$this->server_name=$s_name;		/*服务器名称或地址*/
		$this->server_user=$s_user;		/*服务器用户名*/
		$this->database_link=mysql_connect($this->server_name,$this->server_user,$this->database_pass);
		mysql_select_db($this->database_name,$this->database_link);
		mysql_query("set names utf8");	/*数据库编码格式*/
	}
	function selects($sql){
		/*select *(或者字段名多个字段用逗号分隔) from 表名1,表明2... where .... */
		$arr=array();/*二维数组*/
		$req=mysql_query($sql);
		if (mysql_affected_rows()>0) {
			//echo "查询成功";
			$i=0;
			while ($re=mysql_fetch_array($req)) {
				//foreach ($re as $key => $value) {/*遍历关联数组*/
					//$arr[$i][$key]=$value;
				//}							//array_push($arr,$re);
				$arr[$i]=$re;
				$i++;
			}

			return $arr;
		}
		else{
			return false;
		}
	}
	function inserts($sql,$table_name="",$key_names=array(),$key_values=array()){/*4个参数*/
		/*insert into 表名(字段1,字段2,字段3,..)values('字段1值','字段2值','字段3值',...);*/
		if ($sql===0||$sql==null||$sql==""||$sql==false) {
			$kn="";
			$kv="";
			for ($i=0,$len=count($key_names); $i <$len ; $i++) { 
				$kn.=$key_names[$i].",";
				$kv.="'".$key_values[$i]."',";
			}
			$sqls="insert into $table_name(".substr($kn,0,strlen($kn)-1).")values(".substr($kv,0,strlen($kv)-1).")";
			//echo $sqls;
			$req=mysql_query($sqls);
		}
		else{
			$req=mysql_query($sql);
		}
		if(mysql_affected_rows()>0){	/*插入数据成功*/
			//echo "插入数据成功";
			return true;
		}
		else{
			//echo "插入数据失败";
			return false;
		}
	}
	function updates($sql,$table_name="",$key_names=array(),$new_key_value=array(),$wheres=""){/*5个参数*/
		/*updata 表名 set 字段1='值1',字段2='值2',... where 字段='某值'... （and  or）*/
		if($sql===0||$sql==null||$sql==""||$sql==false){
			$kn="";
			for ($i=0,$len=count($key_names); $i < $len; $i++) { 
				$kn.=$key_names[$i]."='".$new_key_value[$i]."',";
			}
			$sqls="update $table_name set ".substr($kn,0,strlen($kn)-1)." ".$wheres;
			//echo $sqls;
			$req=mysql_query($sqls);
		}
		else{
			$req=mysql_query($sql);
			//echo $sql;
		}
		if(mysql_affected_rows()>0){	/*修改数据成功*/
			//echo "true";
			return true;
		}
		else{
			//echo "false";
			return false;
		}
	}
	function deletes($sql,$table_name,$wheres=""){
		/* delete from 表名 where 字段1='值1' ... */
		if ($sql===0||$sql==null||$sql==""||$sql==false) {
			$sqls="delete from $table_name ".$wheres;
			mysql_query($sqls);
		}
		else{
			$req=mysql_query($sql);
		}
		if(mysql_affected_rows()>0){	/*删除数据成功*/
			return true;
		}
		else{
			return false;
		}		
	}
}
//$conn=new mysqls();
?>
