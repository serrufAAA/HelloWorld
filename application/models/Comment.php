<?php
class application_Models_Comment extends Core_Model
{
	function getAllComments(){
		$connect = core_BDClient::getInstance();
    	$db=$connect->getDb();
 		$sql="SELECT * FROM coments";
    	$comments = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    	return $comments;
	}

	function add($comment){
		$connect = core_BDClient::getInstance();
	    $db=$connect->getDb();
	    if(!empty($comment->content)){
	    	$sql="INSERT INTO coments (post_id, content, create_time) VALUES('{$comment->post_id}', '{$comment->content}', {$comment->time})";
	    	$db->exec($sql);
	    }
    }
}