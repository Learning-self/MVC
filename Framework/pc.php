<?php 
	$current_dir = dirname(__FILE__);
	include_once($current_dir.'/includes/list.inc.php');
	foreach ($paths as $path) {
		include_once($current_dir.'/'.$path);
	}
	class PC{

		public static $controller;
		public static $method;
		public static $config;

		private static function init_db(){
			DB::init('mysql',self::$config['dbconfig']);
		}

		private static function init_view(){
			View::init('Smarty',self::$config['viewconfig']);
		}

		private static function init_controller(){
			self::$controller = isset($_GET['controller'])?myAddslashes($_GET['controller']):'index';
		}

		private static function init_method(){
			self::$method = isset($_GET['method'])?myAddslashes($_GET['method']):'index';
		}

		public static function run($config){
			self::$config = $config;
			self::init_db();
			self::init_view();
			self::init_controller();
			self::init_method();
			C(self::$controller,self::$method);
		}
		/**
		 *php的public、protected、private三种访问控制模式的区别  
		 *【public】: 公有类型
         *在子类中可以通过self::var调用public方法或属性,parent::method调用父类方法
　　　　 *在实例中可以能过$obj->var来调用public类型的方法或属性
		 *【protected】: 受保护类型
         *在子类中可以通过self::var调用protected方法或属性,parent::method调用父类方法
         *在实例中不能通过$obj->var来调用 protected类型的方法或属性
		 *【private】: 私有类型
 		 *该类型的属性或方法只能在该类中使用，在该类的实例、子类中、子类的实例中都不能调用私有类型的属性和方法
		 *
		 *【在类的实例中 只有公有属性和方法才可以通过实例化来调用】
		 **/
	}

?>