<?php
//espacio de controladores
namespace App\Controllers\Api;
//interfaz para contenedor de dependencias
use Psr\Container\ContainerInterface as ContainerInterface;
//mandamos llamar al controlador abstracto
use Core\Controllers\Parents\AbstractController as AbstractController;
//controlador de inicio
class CovidController extends AbstractController{

  /**********************************************/
  /*****Funciones de Intanciacion y constructor**/
  /**********************************************/
  public function __construct(ContainerInterface $container){

    $this->container=$container;
    $this->setMainInstances();
    $this->warehouseManager=$this->container['warehouse-manager'](['projectId'=>'estado-de-resultados-266105']);

  }
  /*******************************/
  /*****Funciones de Controlador**/
  /*******************************/
  public function index($request,$response){

    $covidWarehouse=$this->warehouseManager->getWarehouse('covid');

    $covidWarehouse->index();
    
  }
  public function country($request,$response,$args){

    

  }

  public function day($request,$response,$args){



  }

}

?>