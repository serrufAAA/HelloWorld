<?php
class PostController extends Controller
{
	/*function __construct()
    {
        $this->view = new View();
        $this->model = new PostModel();
    }*/

    function actionAdd(){
    $this->view = new View();
    $this->model = new PostModel();
    //$this->view->render('application/views/PostAddView.php');
    $this->view->generate('PostAddView.php');
    $this->model->Add();
    }
}