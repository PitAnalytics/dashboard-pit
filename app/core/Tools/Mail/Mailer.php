<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

namespace Core\Tools\Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{

  protected static $instance;
  protected $mailer;

  public static function instanciate(string $user,string $password,string $name){
    //
    if (!self::$instance instanceof self){
     self::$instance = new self($user,$password,$name);
    }
    return self::$instance;
  }
  public function __construct(string $user,string $password,string $name){

    //nueva instancia de mailer
    $this->mailer = new PHPMailer(true);

  }
  public function setReceivers(array $mainReceivers, array $copyReceivers = [], array $hiddenCopyReceivers = []){

  }
  public function setMessage(string $subject,string $message){

  }
  public function setFiles(array $files=[]){

  }

}
