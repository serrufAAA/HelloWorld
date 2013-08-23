<?php
class MainController extends Controller
{
    private $post;
    private $comment;
	function __construct()
    {
        //$this->model = new PostModel();
    }

	function actionIndex()
    {	
        $this->view = new View();
        $this->post = new PostModel;
        $this->comment = new CommentModel;
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