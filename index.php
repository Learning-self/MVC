<?php
	//防止乱码
	header('Content-type:text/html;charset=utf-8');
	// 设置时区
	date_default_timezone_set('Asia/Shanghai');
	//引入配置文件
	require_once('Framework/includes/config.php');
	// 引入微型框架：主要是在pc.php开头分别引入框架的各个文件
	require_once('Framework/pc.php');
	// 调用run方法：
	// 1、处理配置信息；
	// 2、初始化数据库以及视图；
	// 3、初始化控制器以及调用控制器方法【url形式：index.php?controller=控制器名&method=方法名】
	PC::run($config);

?>