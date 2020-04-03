<?php
//espacio de controladores
namespace App\Controllers\Page;
//interfaz para contenedor de dependencias
use Psr\Container\ContainerInterface as ContainerInterface;
//mandamos llamar al controlador abstracto
use Core\Controllers\Parents\AbstractController as AbstractController;
//controlador de inicio
class DashboardController extends AbstractController{

  /**********************************************/
  /*****Funciones de Intanciacion y constructor**/
  /**********************************************/
  public function __construct(ContainerInterface $container){

    $this->container=$container;
    $this->setMainInstances();
    $this->entityManager = $this->container['entity-manager'];

  }
  /*******************************/
  /*****Funciones de Controlador**/
  /*******************************/
  public function index($request,$response){

    session_start();

    if(!isset($_SESSION['nickname'])){
      return $response->withRedirect($this->globals['url'].'/user/signin');
    }
    else{
      $userRepository = $this->entityManager->getRepository('user');
      $dashboardRepository = $this->entityManager->getRepository('dashboard');

      $dashboards=$dashboardRepository->index();
      $user = $userRepository->getByNickname($_SESSION['nickname']);

      $view=[];
      $view['user'] = $user;
      $view['dashboards']=$dashboards;
      
      $this->twig->render($response,'layouts/datastudio/index.php',$view);
    }
        
  }

  public function dashboard($request,$response,$args){

    session_start();

    if(!isset($_SESSION['nickname'])){
      return $response->withRedirect($this->globals['url'].'/user/signin');
    }
    else{

      $userRepository = $this->entityManager->getRepository('user');
      $dashboardRepository = $this->entityManager->getRepository('dashboard');

      $dashboard=$dashboardRepository->getById($args['id']);
      $user = $userRepository->getByNickname($_SESSION['nickname']);

      $view=[];
      $view['user'] = $user;
      $view['dashboard']=$dashboard;
      $this->twig->render($response,'layouts/datastudio/dashboard.php',$view);
    }

  }

  public function page($request,$response,$args){

    session_start();

    if(!isset($_SESSION['nickname'])){
      return $response->withRedirect($this->globals['url'].'/user/signin');
    }
    else{

      $userRepository = $this->entityManager->getRepository('user');
      $dashboardRepository = $this->entityManager->getRepository('dashboard');

      $dashboard = $dashboardRepository->getById($args['id']);


      $view=[];
      $this->twig->render($response,'layouts/datastudio/dashboard.php',$view);
    }

  }

}

?>