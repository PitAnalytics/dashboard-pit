<?php

namespace App\Models\ORM\Validators;
use Respect\Validation\Validator as Validator;
use Respect\Validation\Exceptions\NestedValidationException as NestedValidationException;

class UserValidator{

  //
  protected $nickname;
  protected $passowrd;

  //
  public function __construct(){

    $this->nickname = Validator::alnum()->notEmpty()->noWhitespace();
    $this->password = Validator::alnum()->notEmpty()->noWhitespace();

  }

  //
  public function getValidationErrors($user){

    $errors=[];
    
    try{
      $this->nickname->setName('nickname')->assert($user->nickname);
    }
    catch(NestedValidationException $exception){
      $errors['nickname']=$exception->getMessages();
    }
    //
    try{
      $this->nickname->setName('password')->assert($user->password);
    }
    catch(NestedValidationException $exception){
      $errors['password']=$exception->getMessages();
    }
    return $errors;

  }

}