<?php
class application_Controllers_Post extends core_Controller
{

    function actionAdd(){
    	$this->view = new core_View();
    	$this->model = new application_Models_Post();
    	$post = new core_Post();
    	$this->view->generate('PostAddView.php');
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['tittle'])){
				$post->title=trim(strip_tags($_POST['tittle']));
			}
			if(!empty($_POST['content'])){
				$post->content=trim($_POST['content']);
			}
		}
		$time=time();
		$post->time=$time;
    	$this->model->add($post);
    }
}