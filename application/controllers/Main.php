<?php
class Application_Controllers_Main extends core_Controller
{

	function actionIndex()
    {	
        $this->view = new core_View();
        $post = new Application_Models_Post;
        $comment = new Application_Models_Comment;
        $page=1;
        if(isset($_GET['p'])){
            $page=$_GET['p'];
        }
        $posts=$post->getPosts($page);
        $pageCount=$post->getPostsNumb();
        $time = $post->time;
        $sql=$post->query;
        $comments=$comment->getAllComments();
        $this->view->generate('MainView.php', array(
        'posts' => $posts,
        'comments' => $comments,
        'pagesCount' => $pageCount
        ));
    }
}