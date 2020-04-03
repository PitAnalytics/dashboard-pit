<?php

namespace Core\Tools\MongoDB;

use MongoDB\Client as Client;

class MongoSingleton{

  protected static $instance;

  public static function instanciate(){

    if(!isset(self::$instance)){

      self::$instance = new Client;

    }
    return self::$instance;

  }
  
}
