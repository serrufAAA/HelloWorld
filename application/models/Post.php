<?php
class Application_Models_Post extends Core_Model
{
	public $error=array();

	function add($post){
		$connect = core_BDClient::getInstance();
	    $db=$connect->getDb();
	    $STH = $db->prepare("INSERT INTO post(title, content, create_time) VALUES(:title, :content, :time)");
	    $STH->execute((array)$post);
    }

	function getPosts(){
		$connect = core_BDClient::getInstance();
    	$db=$connect->getDb();
    	$msq= "SELECT * FROM  post ORDER by id DESC LIMIT 0,10";
    	$posts = $db->query($msq)->fetchAll(PDO::FETCH_CLASS, "core_Post");
    	return $posts;
	}

	function getPostsNumb(){
		$connect = core_BDClient::getInstance();
    	$db=$connect->getDb();
    	$msq= "SELECT * FROM  post ORDER by id DESC";
    	$posts = $db->query($msq)->fetchAll(PDO::FETCH_CLASS, "core_Post");
    	$count=count($posts);
    	$size=ceil($count/6);
    	return $size;
	}

	function validate($post){
		if(empty($post->title))
			$this->error['errorTitle']="Заголовок не может быть пустым";
		if(empty($post->content)) {
			$this->error['errorContent']="Вы ничего не написали в сообщении";
		} else {
			if(strlen($post->content) < 4)
				$this->error['errorContent']="Сообщение должно быть больше 3 символов";
		}
	}

	function hasError(){
		return (!empty($this->error)) ? true : false; 
	}

	function getTread($tread_id){
		$connect = core_BDClient::getInstance();
    	$db=$connect->getDb();
    	$STH = $db->prepare("SELECT * FROM  post WHERE id= :tread_id");
    	$STH->bindParam(':tread_id', $tread_id);
    	$STH->execute();
    	$STH->setFetchMode(PDO::FETCH_CLASS, 'core_Post');  
    	$post=$STH->fetch();
    	return $post;
	}
}