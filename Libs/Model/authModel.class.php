<?php 
	class authModel{
		// 存放当前登录的管理员信息
		private $auth = '';

		public function __construct(){
			if(isset($_SESSION['auth']) && !(empty($_SESSION['auth']))){
				$this->auth = $_SESSION['auth'];
			}
		}

		public function checkauth($username,$password){
			$adminobj = M('admin');
			$auth = $adminobj->findOne_by_username($username);
			if((!empty($auth)) && $auth['password'] == $password){
				return $auth;
			}else{
				return false;
			}
		}

		public function loginsubmit(){
			if(empty($_POST['username'])||empty($_POST['password'])){
				return false;
			}
			$username = addslashes($_POST['username']);
			$password = addslashes($_POST['password']);
			$authobj = M('auth');
			if($this->auth = $authobj->checkauth($username,$password)){
				$_SESSION['auth'] = $this->auth;
				return true;
			}else{
				return false;
			}
		}

		public function logout(){
			unset($_SESSION['auth']);
			$this->auth = '';
		}
	}

 ?>