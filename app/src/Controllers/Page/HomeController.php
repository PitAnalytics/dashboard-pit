<?php
//espacio de controladores
namespace App\Controllers\Page;
//interfaz para contenedor de dependencias
use Psr\Container\ContainerInterface as ContainerInterface;
//mandamos llamar al controlador abstracto
use Core\Controllers\Parents\AbstractController as AbstractController;
//controlador de inicio
class HomeController extends AbstractController{

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
            $user = $userRepository->getByNickname($_SESSION['nickname']);
            $view=[];
            $view['user'] = $user;
            $this->twig->render($response,'layouts/home/index.php',$view);
        }
        
    }

    public function info($request,$response){

        phpinfo();

    }

}

?>