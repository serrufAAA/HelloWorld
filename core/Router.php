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
        $controllerName = $controllerName . "Controller";
        $actionName     = "action" . $actionName;
        $controllerFile = $controllerName . ".php";
        $controllerPath = "application/controllers/" . $controllerFile;
        if (!file_exists($controllerPath)) {
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