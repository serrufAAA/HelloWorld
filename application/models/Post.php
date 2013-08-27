<?php
class application_Models_Post extends Core_Model
{
	function add($post){
		$connect = core_BDClient::getInstance();
	    $db=$connect->getDb();
	    if(!empty($post->title)){
	    	$sql="INSERT INTO post(title, content, create_time) VALUES('{$post->title}', '{$post->content}', {$post->time})";
	    	$db->exec($sql);
	    }
    }

	function getPosts(){
		$connect = core_BDClient::getInstance();
    	$db=$connect->getDb();
    	$msq= "SELECT * FROM  post ORDER by id DESC";
    	$posts = $db->query($msq)->fetchAll(PDO::FETCH_ASSOC);
    	return $posts;
	}
}