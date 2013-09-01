<?php
class Application_Controllers_Comment extends core_Controller
{
	function actionAdd()
	{
		$this->view = new core_View();
		$model = new Application_Models_Comment();
		$comment = new core_Comment();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$comment->post_id=$_POST['post_id'];
			$comment->content=trim($_POST['content']);
			$time=time();
			$comment->time=$time;
			$model->validate($comment);
			if(!$model->hasError()){
    			$model->add($post);
    			header("Location: ../");
			} 
		}
		$this->view->generate('CommentAddView.php', $model->error);	
	}
}