<?php
class application_Controllers_Main extends core_Controller
{
    private $post;
    private $comment;

	function actionIndex()
    {	
        $this->view = new core_View();
        $this->post = new application_Models_Post;
        $this->comment = new application_Models_Comment;
        $posts=$this->post->getPosts();
        $comments=$this->comment->getAllComments();
    	//$data = $this->model->getAllPosts();
        //var_dump($data);
        $this->view->generate('MainView.php', array(
        'posts' => $posts,
        'comments' => $comments
        ));
    }
}