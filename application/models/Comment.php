<?php
class application_Models_Comment extends Core_Model
{
	function getAllComments(){
		$connect = core_BDClient::getInstance();
    	$db=$connect->getDb();
 		$sql="SELECT * FROM coments";
    	$comments = $db->query($sql)->fetchAll(PDO::FETCH_CLASS, "core_Comment");
    	return $comments;
	}

	function add($comment){
		$connect = core_BDClient::getInstance();
	    $db=$connect->getDb();
	    $STH=$db->prepare("INSERT INTO coments (post_id, content, create_time) VALUES(:post_id, :content, :time)");
	    if(!empty($comment->content)){
	    	$STH->execute((array)$comment);
	    }
    }
}