<?php

namespace App\Models\ORM\Entities;

class User{

  public $id=null;
  public $nickname=null;
  public $created=null;
  public $password=null;

  public function __construct(int $id=null,string $nickname=null,string $password=null,string $created=null){

    $this->id=$id;
    $this->nickname=$nickname;
    $this->password=$password;
    $this->created=$created;

  }

}