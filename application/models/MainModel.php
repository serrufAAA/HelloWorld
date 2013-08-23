<?php
class MainModel extends Model
{
	public function get_data()
    {
    	$connect = DBConnect::getInstance();
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
}