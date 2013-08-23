<?php
class PostModel extends Model
{
	function add(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['tittle'])){
				$title=trim(strip_tags($_POST['tittle']));
			}
			if(!empty($_POST['content'])){
				$content=trim(strip_tags($_POST['content']));
			}
			$connect = BDClient::getInstance();
	    	$db=$connect->getDb();
	    	//var_dump($db);
	    	$time=time();
	    	$sql="INSERT INTO post(title, content, create_time) VALUES('{$title}', '{$content}', {$time})";
	    	$db->exec($sql);
    	}
	}

	function getAllPosts(){
		$connect = BDClient::getInstance();
    	$db=$connect->getDb();
    	$msq= "SELECT * FROM  post ORDER by id DESC";
    	$posts = $db->query($msq)->fetchAll(PDO::FETCH_ASSOC);
        $result = array();
        foreach($posts as $post){
            $id=$post['id'];
            $sql="SELECT * FROM coments WHERE post_id={$id}";
            $com=$db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            $post['coment'] = $com;
            $result[]=$post;
        }
    	return $result;
	}

	function getPosts(){
		$connect = BDClient::getInstance();
    	$db=$connect->getDb();
    	$msq= "SELECT * FROM  post ORDER by id DESC";
    	$posts = $db->query($msq)->fetchAll(PDO::FETCH_ASSOC);
    	return $posts;
	}
}