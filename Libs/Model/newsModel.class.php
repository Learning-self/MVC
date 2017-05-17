<?php
	/**
	* 
	*/
	class newsModel{
		
		public $_table = 'news';

		public function findAll_orderby_datetime(){
			$sql = 'SELECT * FROM '.$this->_table.' ORDER BY datetime DESC';
			return DB::findAll($sql);
		}

		public function fundOne_by_id($id){
			$sql = 'SELCET * FROM '.$this->_table.'WHERE id='.$id;
			return DB::findOne($sql);
		} 

		public function getnewsinfo($id){
			if(empty($id)){
				$data = array();
			}else{
				$sql = "SELECT * FROM ".$this->_table." WHERE id=".$id;
				return DB::findOne($sql);
			}
		}

		public function getnewslist(){
			$data = $this->findAll_orderby_datetime();
			foreach($data as $k=>$news){
				$data[$k]['content'] = mb_substr(strip_tags($data[$k]['content']), 0,200);
			}
			return $data;
		}

		public function newssubmit(){
			extract($_POST);
			if(empty($title)||empty($content)){
				return 0;
			}
			$title = addslashes($title);
			$content = addslashes($content);
			$author = addslashes($author);
			$from = addslashes($from);
			$newsobj = M('news');
			$data = array(
					'title'=>$title,
					'content'=>$content,
					'author'=>$author,
					'source'=>$from,
					'datetime'=>date("Y-m-d h:i:s",time())
			);
			if($_POST['id'] != ''){ //id不为空，则表明此操作是更新操作
				$newsobj->update($data,intval($_POST['id']));
				return 1;
			}else{ //id为空，则表明此操作是添加操作
				$newsobj->insert($data);
				return 2;
			}

		}


		public function insert($data){
			return DB::insert($this->_table,$data);
		}

		public function delete_by_id($id){
			return DB::delete($this->_table,'id='.$id);
		}

		public function update($data,$id){
			return DB::update($this->_table,$data,'id='.$id);
		}

		public function count(){
			$sql = 'SELECT count(*) FROM '.$this->_table;
			return DB::findResult($sql,0,0);
		}
	}
?>