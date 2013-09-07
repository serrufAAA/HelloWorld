<?php
class core_Controller {
    
    public $model;
    public $view;
    
    function __construct()
    {
        $this->view = new core_View();
    }
    
    function action_index()
    {
    }
}