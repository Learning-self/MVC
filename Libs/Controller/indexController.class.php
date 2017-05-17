<?php
	class indexController{

		public function index(){
			$newsobj = M('news');
			$data = $newsobj->getnewslist();
			VIEW::assign(array('data'=>$data));
			VIEW::display('index/index.html');
		}

		public function newsshow(){
			$newsobj = M('news');
			$data = $newsobj->getnewsinfo(intval($_GET['id']));
			VIEW::assign(array('data'=>$data));
			VIEW::display('index/show.html');
		}
		public function about(){
			$about = array(
				'name'=>'Gary',
				'e_mail'=>'413169349@qq.com',
				'Tel'=>'18888888888'
			);
			VIEW::assign(array('about'=>$about));
			VIEW::display('index/about.html');
		}
	}
?>