<?php
	
	class adminController{
		// 存放当前登录管理员的信息
		public $auth;

		public function __construct(){
			@session_start();
			// 判断当前是否已经登录，此过程放在auth模型中
			if(!(isset($_SESSION['auth']))&&(PC::$method != 'login')){
				$this->showmessage('请登录后再操作！','admin.php?controller=admin&method=login');
			}else{
				$this->auth = isset($_SESSION['auth'])?$_SESSION['auth']:array();
			}
		}
		// 显示首页
		// 控制器方法所要做的事情：
		// 使用哪种模型，模型的哪个方法；
		// 注册模型方法返回的数组变量到模板中;
		// 调用模板文件。
		public function index(){
			$newsobj = M('news');
			$newsnum = $newsobj->count();
			VIEW::assign(array('newsnum'=>$newsnum));
			VIEW::display('admin/index.html');
		}
		// 登录处理
		// 1、登录处理的业务逻辑放在auth以及admin模型中
		// 2、同表名的admin模型:从数据库中存取信息
		// 3、auth模型：进行信息的验证
		public function login(){
			if(!isset($_POST['submit'])){
				VIEW::display('admin/login.html');
			}else{
				$this->checklogin();
			}
		}

		// 退出登录
		public function logout(){
			$authobj = M('auth');
			$authobj->logout();
			$this->showmessage('退出成功！','admin.php?controller=admin&method=login');
		}

		public function newsadd(){
			// 判断是否有POST数据
			if (empty($_POST['submit'])) {		//没有POST数据，就显示添加、修改的界面
				// 判断是添加还是修改决定是否显示旧信息
				if(isset($_GET['id'])){//修改操作页面，数据为旧数据
					//读取旧信息
					$newsobj = M('news');
					$id = intval($_GET['id']);
					$data = $newsobj->getnewsinfo($id);
				}else{
					$data = array();//添加操作页面，数据为空
				}
				VIEW::assign(array('data'=>$data));
				VIEW::display('admin/newsadd.html');
			}else{		//有POST数据【表明不是修改就是新增数据】，就进入添加、处理的程序
				$this->newssubmit();	
			}
		}

		public function newslist(){
			$data = $this->getnewslist();
			VIEW::assign(array('data'=>$data));
			VIEW::display('admin/newslist.html');
		}

		public function newsdelete(){
			if($_GET['id']){
				$this->deletenews();
				$this->showmessage('删除新闻成功！','admin.php?controller=admin&method=newslist');
			}
		}

		/*这里是方法里面调用的方法*/
		public function checklogin(){
			$authobj = M('auth');
			if($authobj->loginsubmit()){
				$this->showmessage('登录成功！','admin.php?controller=admin&method=index');
			}else{
				$this->showmessage('登录失败！','admin.php?controller=admin&method=login');
			}
		}

		public function getnewslist(){
			$newsobj = M('news');
			return $newsobj->findAll_orderby_datetime();
		}

		public function deletenews(){
			$newsobj = M('news');
			return $newsobj->delete_by_id(intval($_GET['id']));
		}

		public function showmessage($info,$url){
			echo "<script>alert('$info');window.location.href='$url'</script>";
			exit;
		}

		public function newssubmit(){
			$newsobj = M('news');
			$result = $newsobj->newssubmit($_POST);
			if($result==0){
				$this->showmessage('操作失败！','admin.php?controller=admin&method=newsadd&'.$_POST[id]);
			}
			if($result==1){
				$this->showmessage('修改成功！','admin.php?controller=admin&method=newslist');
			}
			if($result==2){
				$this->showmessage('添加成功！','admin.php?controller=admin&method=newslist');
			}
		}
	}
?>