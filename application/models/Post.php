<?php
class application_Models_Post extends Core_Model
{
	function add($post){
		$connect = core_BDClient::getInstance();
	    $db=$connect->getDb();
	    $STH = $db->prepare("INSERT INTO post(title, content, create_time) VALUES(:title, :content, :time)");
	    if(!empty($post->title)){
	    	$STH->execute((array)$post);
	    }
    }

	function getPosts(){
		$connect = core_BDClient::getInstance();
    	$db=$connect->getDb();
    	$msq= "SELECT * FROM  post ORDER by id DESC";
    	$posts = $db->query($msq)->fetchAll(PDO::FETCH_CLASS, "core_Post");
    	return $posts;
	}
}