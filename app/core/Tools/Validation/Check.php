<?php

namespace Core\Tools\Validation;

use Respect\Validation\Validator as Validator;
use Respect\Validation\Exceptions\NestedValidationException as NestedValidationException;

class Check{

  //atributo singleton
  protected static $instance=null;

  //funcion singleton
  public static function instanciate(){

    if (!self::$instance instanceof self){

     self::$instance = new self;
    
    }
    return self::$instance;
  }

  //validacion a partir de reglas y registro
  public function getValidationErrors(array $rules, array $request){

    //resultados vacios
    $validationErrors=[];
  
    //iteramos reglas comparandolo con el campo de registro (request)
    foreach ($rules as $field => $rule) {

      try{

        $rule->setName($field)->assert($request[$field]);

      }
      catch(NestedValidationException $e){
        $errors=$e->getMessages();
        $validationErrors[$field]=$errors;
      }

    }

    //regresamos estructura de datos de validacion
    return $validationErrors;

  }

}