<?php
class CommentModel extends Model
{
	function getAllComments(){
		$connect = BDClient::getInstance();
    	$db=$connect->getDb();
 		$sql="SELECT * FROM coments";
    	$comments = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    	return $comments;
	}
}