<?php
class application_Controllers_Main extends core_Controller
{
    private $post;
    private $comment;

	function actionIndex()
    {	
        $this->view = new core_View();
        $post = new application_Models_Post;
        $comment = new application_Models_Comment;
        $posts=$post->getPosts();
        $comments=$comment->getAllComments();
    	//$data = $this->model->getAllPosts();
        //var_dump($data);
        $this->view->generate('MainView.php', array(
        'posts' => $posts,
        'comments' => $comments
        ));
    }
}