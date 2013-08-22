<?php
require_once "application/models/MainModel.php";
class MainController extends Controller
{
	function __construct()
    {
        $this->view = new View();
        $this->model = new MainModel();
    }

	function actionIndex()
    {	
    	$data = $this->model->get_data();
        //var_dump($data);
        $this->view->generate('MainView.php', $data);
    }
}