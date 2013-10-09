<?php
class Application_Controllers_Comment extends core_Controller
{
	function actionAdd(){
		$this->view = new core_View();
		$model = new Application_Models_Comment();
		$comment = new core_Comment();
		if(isset($_POST['submit'])){
			$comment->post_id=$_POST['post_id'];
			$comment->content=trim($_POST['content']);
			$time=time();
			$comment->time=$time;
			$model->validate($comment);
			$refer = $_POST['refer'];
			$parts=explode("/", $refer);
			$lastPart=$parts[4];
			if(!$model->hasError()){
    			$model->add($comment);
    			header("Location: ../" . $lastPart);
			} 
		}
		$this->view->generate('CommentAddView.php', $model->error);	
	}
}