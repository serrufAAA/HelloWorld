<?php
class Application_Controllers_Post extends core_Controller
{
    function actionAdd(){
    	$this->view = new core_View();
    	$model = new Application_Models_Post();
    	$post = new core_Post();
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$post->title=trim($_POST['tittle']);
			$post->content=trim($_POST['content']);
			$post->time=time();
    		$model->validate($post);
			if(!$model->hasError()){
    			$model->add($post);
    			header("Location: ../"); 
			} 
		} 
		$this->view->generate('PostAddView.php', $model->error);
	}
}
