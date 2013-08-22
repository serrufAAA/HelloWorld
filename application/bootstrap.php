<?php
require_once "core/controller.php";
require_once "core/model.php";
require_once "core/view.php";
require_once "core/Router.php";
require_once "core/BDClient.php";
$route = new Router();
$route->start();