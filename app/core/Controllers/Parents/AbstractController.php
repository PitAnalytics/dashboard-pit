<?php
//
namespace Core\Controllers\Parents;
//
use Psr\Container\ContainerInterface as ContainerInterface;
use Core\Controllers\Interfaces\ControllerInterface as ControllerInterface;
//
abstract class AbstractController{

    //container main dependency
    protected $container;
    //app config and order by json
    protected $config;
    //mysql databases
    protected $databases=[];
    //template engines
    protected $twig;
    //usuario principal repositorio y modelo simple
    protected $entityManager;



    //construction using pimple container dependency inyection
    public abstract function __construct(ContainerInterface $container);

    //instancias principales y de configuracion
    protected function setMainInstances(){

        //dependencia de configuracion principal
        $this->config=$this->container['config'];
        //variables globales de aplicacion
        $this->globals=$this->config->globals();
        //instanciamos gestor de usuarios
        $this->validation['rules']=$this->container['validation-rules'];
        //instanciamos checador de reglas
        $this->validation['check']=$this->container['validation-check'];
        //instanciamos vistas dinamicas de twig
        $this->twig=$this->container['twig'];
        //mandamos llamar la insrancia de usuario
        $this->entityManager=$this->container['entity-manager'];

    }

}
//
?>