<?php

namespace App\Models\ORM\Repositories;

use Illuminate\Database\Eloquent\Model as Model;
use App\Models\ORM\Entities\User as User;
use Exception;

class UserRepository extends Model{

  //creamos 
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $fillable =['nickname','password'];

  //mandamos llamar todos los elementos
  public function index(){

    //mandamos llamar toda la tabla
    $table = self::all();
    //entidades de usuario vacios
    $users = [];
    //
    foreach ($table as $record) {

      $user = new User();
      $user->id=$record->id;
      $user->nickname=$record->nickname;
      $user->password=null;
      $user->created=$record->created;
      //llenamos el arreglo con DAO de usuario
      $users[] = $user;
      
    }

    return $users;

  }

  public function getById(int $id):User
  {

    $record = self::find($id);

    $user = new User();
    $user->id=$record->id;
    $user->nickname=$record->nickname;
    $user->password=null;
    $user->created=$record->created;

    return $user;

  }

  public function getByNickname(string $nickname):User
  {

    $record = self::where('nickname',$nickname)->first();

    $user = new User();
    $user->id=$record->id;
    $user->nickname=$record->nickname;
    $user->password=null;
    $user->created=$record->created;

    return $user;

  }
  public function insert(User $user):bool
  {

    //creamos nuevo active record
    $record = new self;

    //pasamos parametros
    $record->nickname=$user->nickname;
    $record->password=password_hash($user->nickname,PASSWORD_BCRYPT,['cost'=>10]);

    //tratamos de insertar
    try{
      $record->save();
      return true;
    }
    catch(Exception $e){
      return false;
    }


  }
  public function exists(User $user):bool
  {
    //consultamos registro
    $record = self::where('nickname',$user->nickname);
    //consultamos si existe o no el registro
    if(!isset($record->nickname)){
      return false;
    }
    else{
      return true;
    }

  }
  public function validatePassword(User $user):int
  {

    $record=self::where('nickname',$user->nickname)->first();

    if(!isset($record->nickname)){
      return -1;
    }
    else{

      if(!password_verify($user->password,$record->password)){
        return 0;
      }
      else{
        return 1;
      }
      
    }

  }

}
?>