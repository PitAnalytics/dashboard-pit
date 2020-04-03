<?php
namespace Core\Models\Warehouses;

use Core\Tools\Google\BigQuerySingleton;

class AbstractWarehouse{

  protected $bigQuery = null;

  public function __construct($bigQuery){

    $this->bigQuery=$bigQuery;

  }

}