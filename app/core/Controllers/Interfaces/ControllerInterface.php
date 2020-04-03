<?php
//
namespace Core\Controllers\Interfaces;
use Core\Controllers\Interfaces\ControllerInterface as ControllerInterface;
//
interface ControllerInterface{
  
  //construction using dependency inyection
  public function __construct(ControllerInterface $container);

}