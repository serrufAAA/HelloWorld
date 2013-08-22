<?php
require_once "application/models/PostModel.php";
class PostController extends Controller
{
	function __construct()
    {
        $this->view = new View();
        $this->model = new PostModel();
    }

    function actionAdd(){		
        $this->view->generate('PostAddView.php');
        $this->model->Add();
    }
}