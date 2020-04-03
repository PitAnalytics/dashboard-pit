<?php
//
$container['entity-manager']=function($container){

  return App\Models\Managers\EntityManager::instanciate();

};
