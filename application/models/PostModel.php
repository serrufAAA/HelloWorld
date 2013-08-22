<?php
class PostModel extends Model
{
	function Add(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['tittle'])){
				$title=trim(strip_tags($_POST['tittle']));
			}
			if(!empty($_POST['content'])){
				$content=trim(strip_tags($_POST['content']));
			}
			$connect = DBConnect::getInstance();
	    	$db=$connect->getDb();
	    	//var_dump($db);
	    	$time=time();
	    	$sql="INSERT INTO post(title, content, create_time) VALUES('{$title}', '{$content}', {$time})";
	    	$db->exec($sql);
    	}
	}
}