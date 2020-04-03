<?php

//espacio de herramientas 
namespace Core\Tools\Http;

//mandamos llamar la libreria guzzle
use GuzzleHttp\Client as Client;

//creamos una clase pool singleton de clientes
class ClientPool extends Client{

  //pool de intancias
  private static $instances=[];
  //funcion multisingleton
  public static function instanciate($instances){
    //llave nombre de la instancias
    $key = key($instances);
    //argumentos del constructor de instancia
    $settings = current($instances);
    //de no existir la instanica
    if(!isset(self::$instances[$key])){
      //creamos la instancia
      self::$instances[$key]=new self($settings);
    }
    //retornamos instanica 
    return self::$instances[$key];

  }

}
?>