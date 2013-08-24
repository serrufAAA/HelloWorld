<?php
class PostController extends Controller
{

    function actionAdd(){
    	$this->view = new View();
    	$this->model = new PostModel();
    	$post = new Post();
    	$this->view->generate('PostAddView.php');
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(!empty($_POST['tittle'])){
				$post->title=trim(strip_tags($_POST['tittle']));
			}
			if(!empty($_POST['content'])){
				$post->content=trim(strip_tags($_POST['content']));
			}
		}
		$time=time();
		$post->time=$time;
    	$this->model->add($post);
    }
}