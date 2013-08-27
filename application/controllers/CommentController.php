<?php
class CommentController
{
	function actionAdd()
	{
		$this->view = new View();
		$this->model = new CommentModel();
		$this->view->generate('CommentAddView.php');
		$comment = new Comment();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['post_id'])){
				$comment->post_id=$_POST['post_id'];
			}
			if(!empty($_POST['content'])){
				$comment->content=trim($_POST['content']);
			}
		}
		$time=time();
		$comment->time=$time;
    	$this->model->add($comment);
	}
}