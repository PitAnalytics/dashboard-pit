<?php
//espacio de controladores
namespace App\Controllers\Page;
//interfaz para contenedor de dependencias
use Psr\Container\ContainerInterface as ContainerInterface;
//mandamos llamar al controlador abstracto
use Core\Controllers\Parents\AbstractController as AbstractController;
//controlador de usuario y sesiones
class UserController extends AbstractController{

  /**********************************************/
  /*****Funciones de Intanciacion y constructor**/
  /**********************************************/
  public function __construct(ContainerInterface $container){

    //container y sus dependencias
    $this->container = $container;
    //metodos plantilla de instanciacion
    $this->setMainInstances();
    //mandamos llamar la insrancia de usuario
    $this->entityManager = $this->container['entity-manager'];

  }

  /*******************************/
  /*****Funciones de Controlador**/
  /*******************************/
  public function signinGet($request, $response){

    //
    session_start();
    //de existir sesion abrimos pagina principal
    if(isset($_SESSION['nickname'])){
      return $response->withRedirect($this->globals['url'].'/');
    }
    //de lo contrario redirigimos a inicio de sesion
    else{
      $this->twig->render($response,'layouts/user/signin.php',[]);
    }
        
  }
  
  public function signinPost($request,$response){

    //vista de datos
    $viewData = [];

    //mandamos llamar manager y repositorios
    $userRepository = $this->entityManager->getRepository('user');
    $user = $this->entityManager->getEntity('user');
    $validator = $this->entityManager->getValidator('user');

    //llenamos campos
    $user->nickname = $request->getParsedBody()['nickname'];
    $user->password = $request->getParsedBody()['password'];
    $errors=$validator->getValidationErrors($user);

    //de existir errores de validacion de campos
    if(count($errors)){

      //mostramos dichos errores en el volmulario
      $viewData['errors']=$errors;
      $this->twig->render($response,'layouts/user/signin.php',$viewData);

    }
    //de no existir procedemos a validar
    else{

      //validamos password :  -1||0||1
      $passwordValidation = $userRepository->validatePassword($user);
      switch ($passwordValidation){
        //en caso de no existir usuario
        case -1:
          $viewData['errors']['user'][]='user doesnt exist';
          $this->twig->render($response,'layouts/user/signin.php',$viewData);
          break;
        //en caso de tener password invalido
        case 0:
          $viewData['errors']['password'][]='invalid password';
          $this->twig->render($response,'layouts/user/signin.php',$viewData);
          break;
        //en caso de ser correcto el password
        case 1:
          session_start();
          $_SESSION['nickname']=$user->nickname;
          return $response->withRedirect($this->globals['url'].'/');
          break;
      }

    }

  }
  public function signout($request,$response){

    //mandamos llamar sesion, destruimos sesion y redirigimos a inicio de sesion
    session_start();
    session_destroy();
    return $response->withRedirect($this->globals['url'].'/user/signin');
  
  }

}

?>