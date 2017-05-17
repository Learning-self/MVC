<?php 
	/*数据库引擎类库：这里是mysql引擎类，这个类库中可以包含其他数据库类，如：mysqli,oracle等*/
	class Mysql{
		/**
		 *报错函数
		 *@param string $error
		 */
		function error($error){
			// die()的作用：输出和终止，相当于echo()和exit();
			die("对不起，您的操作有误，错误原因为：".$error);
		}

		/**
		 *连接数据库
		 *
		 *@param string $dbhost 主机名
		 *@param string $dbuser 用户名
		 *@param string $dbpsw 密码
		 *@param string $dbname 数据库名
		 *@param string $dbcharset 字符集/编码
		 *@return bool 连接成功或者不成功
		 **/
		function connect($config){
			// extract()函数用于从数组中将变量导入到当前的符号表
			extract($config);
			if (!($con = @mysql_connect($dbhost,$dbuser,$dbpsw))) {
				$this->error(mysql_error());
			}
			if (!(@mysql_select_db($dbname,$con))) {
				$this->error(mysql_error());
			}
			// 使用mysql_query()设置编码，格式为：mysql_query("set names utf8");
			mysql_query("set names ".$dbcharset);
		}

		/**
		 *执行sql语句
		 *@param string $sql
		 *@return bool 返回执行成功得到的资源或者返回执行失败
		 *
		 */
		function query($sql){
			if(!($result = mysql_query($sql))){
				$this->error($sql."<br />".mysql_error());
			}else{
				return $result;
			}
		}

		/**
		 *列表[多条]
		 *@param source $result sql语句通过mysql_query()执行后获得的结果资源
		 *@return array 返回列表数组[二维数组]
		 */
		function findAll($result){
			while ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
				$list[] = $row;
			}
			return isset($list)?$list:'';
		}

		/**
		 *单条
		 *@param source $result sql语句通过mysql_query()获得的结果资源
		 *@return array 返回单条信息数组
		 *
		 */
		function findOne($result){
			$row = mysql_fetch_array($result,MYSQL_ASSOC);
			return $row;
		}

		/***
		 *指定行的指定字段的值
		 *
		 *@param source $result sql语句通过mysql_query执行得到的结果资源
		 *@param int $row 指出结果中的第几行
		 *@param int $field 指出结果中的第几个字段
		 *return mixed 返回指定行的指定字段的值
		 */
		function findResult($result,$row=0,$field=0){
			$row = mysql_result($result, $row,$field);//mysql_result()返回MySQL结果集中一个单元的内容
			return $row;
		}

		/**
		 *添加函数
		 *
		 *@param string $table 表名
		 *@param array $arr 添加数组[包含字段和值的一维数组]
		 *
		 */
		function insert($table,$arr){
			// $sql = "insert into 表名(多个字段)values(多个值)";转义SQL语句中使用的字符串中的特殊字符，并考虑到连接的当前字符集
			foreach ($arr as $key => $value) {//foreach循环数组
				$value = mysql_real_escape_string($value);//mysql_real_escape_string()转义SQL语句中使用的字符串中的特殊字符，并考虑到连接的当前字符集
				$keyArr[] = "`".$key."`";//将$arr数组中的键名保存到$keyArr数组中
				$valueArr[] = "'".$value."'";//将$arr数组中的键值保存到$valueArr数组中，sql中值为字符串需要加单引号

			}
			$keys = implode(",", $keyArr);
			$values = implode(",", $valueArr);
			$sql = "INSERT INTO ".$table."(".$keys.")VALUES(".$values.")";
			$this->query($sql);//调用类自身的query()方法执行这条sql语句
			return mysql_insert_id();//mysql_insert_id()取得上一步 INSERT 操作产生的 ID

		}

		/**
		 *修改函数
		 *
		 *@param string $table 表名
		 *@param array $arr 修改数组(包含字段和值的一维数组)
		 *@param string $where 条件
		 */
		function update($table,$arr,$where){
			//update 表名 set 字段=字段值 where ...
			foreach ($arr as $key => $value) {
				$value = mysql_escape_string($value);
				$keyAndvalueArr[] = "`".$key."`='".$value."'";
			}
			$keyAndvalues = implode(",", $keyAndvalueArr);
			$sql = "update ".$table." set ".$keyAndvalues."where".$where;
			return $this->query($sql);
		}

		/**
		 *删除函数
		 *@param string $table 表名
		 *@param string $where 条件
		 */
		function delete($table,$where){
			$sql = "delete from ".$table." where ".$where;
			return $this->query($sql);
		}
	}	

?>