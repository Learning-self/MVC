<?php
	function C($name,$method){
		require_once('/libs/Controller/'.$name.'Controller.class.php');
		//eval('$obj = new '.$name.'Controller();$obj->'.$method.'();');
		$class = $name.'Controller';
		$obj = new $class();
		$obj->$method();
	}

	function M($name){
		require_once('/libs/Model/'.$name.'Model.class.php');
		//eval('$obj = new '.$name.'Model();');
		$class = $name.'Model';
		$obj = new $class();
		return $obj;
	}

	function V($name){
		require_once('/libs/View/'.$name.'View.class.php');
		//eval('$obj = new '.$name.'View();');
		$class = $name.'View';
		$obj = new $calss();
		return $obj;
	}
	//$path是路径;$name是第三方类名;$params是该类初始化时需要的参数
	function ORG($path,$name,$params=array()){
		require_once('/libs/ORG/'.$path.$name.'.class.php');
		$obj = new $name();
		if(!empty($params)){
			foreach ($params as $key => $value) {
				$obj->$key = $value;
			}
		}
		return $obj;
	}

	function myAddslashes($str){
		return (!get_magic_quotes_gpc())?addslashes($str):$str;
	}
	
?>