<?php

// Service factory for the ORM
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db']=function($container) use($capsule){
  return $capsule;
};

$container['mongo-db']=function($container){

  return Core\Tools\MongoDB\MongoSingleton::instanciate();

};



