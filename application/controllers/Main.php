<?php
class Application_Controllers_Main extends core_Controller
{

	function actionIndex()
    {	
        $this->view = new core_View();
        $post = new Application_Models_Post;
        $comment = new Application_Models_Comment;
        $posts=$post->getPosts();
        $pageCount=$post->getPostsNumb();
        $comments=$comment->getAllComments();
        $this->view->generate('MainView.php', array(
        'posts' => $posts,
        'comments' => $comments,
        'pagesCount' => $pageCount
        ));
    }
}