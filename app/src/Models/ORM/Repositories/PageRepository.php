<?php

namespace App\Models\ORM\Repositories;

use Illuminate\Database\Eloquent\Model as Model;
use App\Models\ORM\Entities\Dashboard as Dashboard;
use Exception;

class PageRepository extends Model{

  //creamos 
  protected $table = 'dashboards';
  protected $primaryKey = 'id';
  protected $fillable =['title','url','width','height'];

  //mandamos llamar todos los elementos
  public function index(){

    //mandamos llamar toda la tabla
    $table = self::all();
    //entidades de usuario vacios
    $dashboards = [];
    //iteramos tabla a modelos
    foreach ($table as $record) {

      $dashboard = new Dashboard;
      $dashboard->id = $record->id;
      $dashboard->title = $record->title;
      $dashboard->url = $record->url;
      $dashboard->width = $record->width;
      $dashboard->height = $record->height;

      $dashboards[] = $dashboard;

    }

    return $dashboards;

  }
  public function getById(int $id){

    $record = self::find($id);
    $dashboard = new Dashboard;
    $dashboard->id = $record->id;
    $dashboard->title = $record->title;
    $dashboard->url = $record->url;
    $dashboard->width = $record->width;
    $dashboard->height = $record->height;

    return $dashboard;

  }
  public function page(){

    return $this->hasMany('App\Models\ORM\Repositories\Page','idDashboard','id');

  }

}
?>