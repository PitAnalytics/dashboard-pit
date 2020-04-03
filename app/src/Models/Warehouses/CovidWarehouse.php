<?php

namespace App\Models\Warehouses;

use Core\Models\Warehouses\AbstractWarehouse;

class CovidWarehouse extends AbstractWarehouse{

  public function index(){

    $index = $this->bigQuery->query(
    "SELECT 
    SUBSTR(CAST(date AS STRING),1,10) AS date, 
    SUM(confirmed) AS confirmed, 
    SUM(deaths) AS deaths, 
    SUM(recovered) AS recovered, 
    SUM(confirmed)-SUM(deaths)-SUM(recovered) AS sick 
    FROM 
      `bigquery-public-data.covid19_jhu_csse.summary` 
    WHERE country_region = 'Mexico' 
    GROUP BY date 
    ORDER BY date ASC; ");

    for ($i=0; $i <count($index); $i++) { 

      $index[$i]['confirmed']=intval($index[$i]['confirmed']);
      $index[$i]['deaths']=intval($index[$i]['deaths']);
      $index[$i]['recovered']=intval($index[$i]['recovered']);

    }

    return $index;

  }

}