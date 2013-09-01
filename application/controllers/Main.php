<?php
class Application_Controllers_Main extends core_Controller
{
    private $post;
    private $comment;

	function actionIndex()
    {	
        $this->view = new core_View();
        $post = new Application_Models_Post;
        $comment = new Application_Models_Comment;
        $posts=$post->getPosts();
        $comments=$comment->getAllComments();
        $this->view->generate('MainView.php', array(
        'posts' => $posts,
        'comments' => $comments
        ));
    }
}