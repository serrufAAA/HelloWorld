<?php
class application_Controllers_Comment extends core_Controller
{
	function actionAdd()
	{
		$this->view = new core_View();
		$this->model = new application_Models_Comment();
		$this->view->generate('CommentAddView.php');
		$comment = new core_Comment();
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