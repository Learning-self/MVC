<?php
/*知识点扫盲*/
// this,self,parent三个关键字从字面上比较好理解,分别是指这、自己、父亲。
//parent　只能调用父类中的公有或受保护的方法，不能调用父类中的属性
//self 　可以调用父类中除私有类型的方法和属性外的所有数据

//this是指向当前对象实例的指针,不指向任何其他对象或类;

//self是指向当前类的指针,
//————首先我们要明确一点，self是指向类本身，
//————也就是self是不指向任何已经实例化的对象，一般self使用来指向类中的静态变量。
//————使用self来调用静态变量,使用self调用必须使用::(域运算符号)

//parent是指向父类的指针
// ————一般我们使用parent来调用父类的构造函数


/*这里是DB工厂类，负责调用各种数据库*/
class DB{

	public static $db;

	public static function init($dbtype,$config){
		self::$db = new $dbtype;
		self::$db->connect($config);
	}

	public static function query($sql){
		return self::$db->query($sql);
	}

	public static function findAll($sql){
		$result = self::$db->query($sql);
		return self::$db->findAll($result);
	}

	public static function findOne($sql){
		$result = self::$db->query($sql);
		return self::$db->findOne($result);
	}

	public static function findResult($sql,$row=0,$field=0){
		$result = self::$db->query($sql);
		return self::$db->findResult($result,$row,$field);
	}

	public static function insert($table,$arr){
		return self::$db->insert($table,$arr);
	}

	public static function update($table,$arr,$where){
		return self::$db->update($table,$arr,$where);
	}

	public static function delete($table,$where){
		return self::$db->delete($table,$where);
	}

}








?>