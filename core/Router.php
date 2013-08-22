<?php
class Router
{
    public function start()
    {
        $controllerName = "Main";
        $actionName     = "Index";
        $routes         = explode("/", $_SERVER['REQUEST_URI']);
        if (!empty($routes[2])) {
            $controllerName = $routes[2];
        }
        if (!empty($routes[3])) {
            $actionName = $routes[3];
        }
        //$modelName      = $controllerName . "Model";
        $controllerName = $controllerName . "Controller";
        $actionName     = "action" . $actionName;
        /*$modelFile      = $modelName . ".php";
        $modelPath      = "application/models/" . $modelFile;
        if (file_exists($modelPath)) {
            include $modelPath;
        }*/
        $controllerFile = $controllerName . ".php";
        $controllerPath = "application/controllers/" . $controllerFile;
        if (file_exists($controllerPath)) {
            include $controllerPath;
        } else {
            $this->error404();
        }
        $controller = new $controllerName;
        $action     = $actionName;
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            $this->error404();
        }
    }
    
    private function error404()
    {
            $host = 'http://' . $_SERVER['HTTP_HOST'] . '/' . "MVC/";
            header('HTTP/1.1 404 Not Found');
            header("Status: 404 Not Found");
            header('Location:' . $host . 'Unknow');
        }
}
?>