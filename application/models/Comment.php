<?php
class Application_Models_Comment extends Core_Model
{
	public $prof;

	/*function __construct(){
		$this->prof = new Core_Db_Profiler();
	}*/

	public $error=array();

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
	    $STH->execute((array)$comment);
    }

    function validate($comment){
		if(empty($comment->content)) {
			$this->error['errorContent']="Вы ничего не написали в сообщении";
		} else {
			if(strlen($comment->content) < 4)
				$this->error['errorContent']="Сообщение должно быть больше 3 символов";
		}
	}

	function hasError(){
		return (!empty($this->error)) ? true : false; 
	}

	function commentForTread($tread_id){
		$connect = core_BDClient::getInstance();
	    $db=$connect->getDb();
	    $STH=$db->prepare("SELECT * FROM coments WHERE post_id=:tread_id");
	    $STH->bindParam(':tread_id', $tread_id);
	    $STH->execute();
	    $comments = $STH->fetchAll(PDO::FETCH_CLASS, "core_Comment");
	    return $comments;
	}
}