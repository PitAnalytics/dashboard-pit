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

    $index = $covidWarehouse->index();

    $response1 = $response->withJson($index,201);
    $response2 = $response1
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    return $response2;
    
  }
  public function country($request,$response,$args){

    

  }

  public function day($request,$response,$args){



  }

}

?>