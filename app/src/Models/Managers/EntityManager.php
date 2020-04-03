<?php
//
namespace App\Models\Managers;
//
use App\Models\ORM\Entities\Dashboard;
use Core\Models\Managers\AbstractManager as AbstractManager;
use Illuminate\Database\Eloquent\Model as Model;
use App\Models\ORM\Repositories\UserRepository as UserRepository;
use App\Models\ORM\Entities\User as User;
use App\Models\ORM\Repositories\DashboardRepository as DashboardRepository;
use App\Models\ORM\Validators\UserValidator as UserValidator;
//
class EntityManager extends AbstractManager{

  protected static $instance=null;

  public static function instanciate()
  {

    if(!isset(self::$instance)){
      self::$instance=new self;
    }
    return self::$instance;

  }
  public function getRepository(string $key):Model
  {
    switch ($key) {
      case 'user':
        return new UserRepository;
      case 'dashboard':
        return new DashboardRepository;
        break;
    }

  }
  public function getEntity(string $key)
  {
    switch ($key) {
      case 'user':
        return new User;
      case 'dashboard':
        return new Dashboard;
        break;
    }
  }
  public function getValidator(string $key)
  {
    switch($key){
      case 'user':
        return new UserValidator;
        break;
    }

  }
  
}
