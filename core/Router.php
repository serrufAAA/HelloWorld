<?php
class core_Router
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
        $controllerName = "Application_Controllers_" . $controllerName;
        $actionName     = "action" . $actionName;
        $controller = new $controllerName;
        $action     = $actionName;
        $controller->$action();
    }
}
?>