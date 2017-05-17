<?php 
	// admin模型：从数据库存取数据
	class adminModel{
		// 定义表名
		public $_table = 'admin';
		// 通过用户名取用户信息
		public function findOne_by_username($username){
			$sql = "SELECT * FROM ".$this->_table." WHERE username='".$username."'";
			return DB::findOne($sql);
		}
		// 取得管理员的数量
		public function count(){
			$sql = 'SELECT count(*) FROM '.$this->_table;
			return DB::findResult($sql,0,0);
		}

	}
 ?>