<?php
//
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
//
use Core\Config\Config as Config;
$config = Config::instanciate('../app/config/config.json');
//
$app = new \Slim\App();
//
/*********************/
/******CONTAINER******/
/*********************/
require_once '../app/main/container/main.php';
require_once '../app/main/container/database.php';
require_once '../app/main/container/models.php';
require_once '../app/main/container/warehouses.php';
//
/******************/
/****ROUTER********/
/******************/
//
require_once '../app/main/router/page/home.php';
require_once '../app/main/router/page/datastudio.php';
require_once '../app/main/router/page/user.php';
//
require_once '../app/main/router/api/covid.php';
/******************/
/****EJECUTAMOS****/
/******************/
$app->run();
?>