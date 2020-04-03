<?php
namespace App\Models\Managers;

use App\Models\Warehouses\CovidWarehouse;
use Core\Models\Warehouses\AbstractWarehouse;
use Core\Tools\Google\BigQuerySingleton;

class WarehouseManager{

  protected $bigQuery = null;

  public function __construct(array $config)
  {

    $this->bigQuery = BigQuerySingleton::instanciate($config);

  }

  public function getWarehouse(string $wharehouse)
  {

    switch($wharehouse){

      case 'covid' :

        return new CovidWarehouse($this->bigQuery);

        break;

    }

  }

}