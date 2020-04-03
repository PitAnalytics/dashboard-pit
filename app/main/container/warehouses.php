<?php
$container['warehouse-manager']=function($container){

    return function($config){

        return new  App\Models\Managers\WarehouseManager($config);
        
    };
};
