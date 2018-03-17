<?php
	include("Mysql_db.php");
	class jm_list
	{		
		private $jm_name;
		private $jm_tel;
		private $jm_address;
		private $jm_mail;

		public function __construct($name,$tel,$address,$mail)
		{
			$this->jm_name=$name;
			$this->jm_tel=$tel;
			$this->jm_address=$address;
			$this->jm_mail=$mail;
		}

		public function isApply()
		{
			$db=new Mysql_db();
			$sql="select * from join_investment where name='".$this->jm_name."' or telphone='".$this->jm_tel."' or email='".$this->jm_mail."' ";
			$rs=$db->query($sql);
			if($db->get_num($rs)>0)
			{
				return true;
			}else{
				return false;
			}
		}

		public function dojoin()
		{
			$db=new Mysql_db();
			$jm_date=date("Y-m-d H:i:s");
			$sql="insert into join_investment(name,telphone,address,email,apply_time) values('".$this->jm_name."','".$this->jm_tel."','".$this->jm_address."','".$this->jm_mail."','$jm_date')";
			$n=$db->update($sql);
			return $n;
		}		
	}

?>