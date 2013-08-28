<?php
class application_Controllers_Post extends core_Controller
{

    function actionAdd(){
    	$this->view = new core_View();
    	$this->model = new application_Models_Post();
    	$post = new core_Post();
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['tittle']) && !empty($_POST['content']) && strlen($_POST['content']) > 3){
				$post->title=trim($_POST['tittle']);
				$post->content=trim($_POST['content']);
				$time=time();
				$post->time=$time;
    			$this->model->add($post);
    			header("Location: ../");
			} 
		} 
		$this->view->generate('PostAddView.php');
	}
}
