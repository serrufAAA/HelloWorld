<?php
class Application_Controllers_Tread extends core_Controller
{
	function actionIndex()
    {	
        $this->view = new core_View();
        $post = new Application_Models_Post;
        $comment = new Application_Models_Comment;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        	$tread_id = $_POST['tread_id'];
        }
        $tread=$post->getTread($tread_id);
        $comments=$comment->commentForTread($tread_id);
        $this->view->generate('TreadView.php', array(
        'tread' => $tread,
        'comments' => $comments
        ));
    }
}