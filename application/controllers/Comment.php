<?php
class application_Controllers_Comment extends core_Controller
{
	function actionAdd()
	{
		$this->view = new core_View();
		$this->model = new application_Models_Comment();
		$comment = new core_Comment();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['post_id']) && !empty($_POST['content']) && strlen($_POST['content']) > 3){
				$comment->post_id=$_POST['post_id'];
				$comment->content=trim($_POST['content']);
				$time=time();
				$comment->time=$time;
    			$this->model->add($comment);
    			header("Location: ../");
				}
			}
		$this->view->generate('CommentAddView.php');	
	}
}