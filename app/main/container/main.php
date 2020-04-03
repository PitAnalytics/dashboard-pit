<?php
//
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;

//
use Core\Config\Config as Config;
$config = Config::instanciate('../app/config/config.json');
$container = new Container([
    'settings' => [
        'displayErrorDetails' => true,
        'responseChunkSize' => 8096,
        'db' => $config->database()
    ]
]);
//
$app = new \Slim\App($container);
//
$container['config']=function($container){

    return Core\Config\Config::instanciate('../app/config/config.json');

};
//
$container['validation-check']=function($container){

    return  Core\Tools\Validation\Check::instanciate();
  
};
//
$container['validation-rules']=function($container){
  
    return Core\Tools\Validation\Rules::instanciate();
  
};
//
$container['twig']=function($container){

    $view = new \Slim\Views\Twig('../app/views',['cache'=>false]);
    $router = $container->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));
    return $view;
  
};
?>