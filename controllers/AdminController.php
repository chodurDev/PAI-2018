<?php
require_once 'AppController.php';

require_once 'outputTableJSON.php';
require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__ . '/../model/Car.php';
require_once __DIR__ . '/../model/CarMapper.php';
require_once __DIR__ . '/../model/Service.php';
require_once __DIR__ . '/../model/ServiceMapper.php';

class AdminController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(): void
    {
        $user = new UserMapper();
        $this->render('index', ['user' => $user->getUser($_SESSION['id'])]);
    }

    public function adminCRM():void
    {
        $user = new UserMapper();

        $this->render('adminCRM', ['user' => $user->getUser($_SESSION['id'])]);
    }
    public function adminRaport():void
    {
        $user = new UserMapper();
        $this->render('adminRaport', ['user' => $user->getUser($_SESSION['id'])]);
    }
    public function adminUnregulated():void
    {
        $user = new UserMapper();
        $this->render('adminUnregulated', ['user' => $user->getUser($_SESSION['id'])]);
    }
    //--------------------------------------


    /**
     *
     */
    public function services(): void
    {
        $services = new ServiceMapper();
        header('Content-type: application/json');
        http_response_code(200);
        output($services->getServices());
    }
    public function insertService():void{

    }


    public function carModel(): void
{
    $carModel = new CarMapper();
    header('Content-type: application/json');
    http_response_code(200);
    output($carModel->getModel());
}
    public function carMarka(): void
    {
        $carMarka = new CarMapper();
        header('Content-type: application/json');
        http_response_code(200);
        output($carMarka->getMarka());
    }



    public function serviceDelete(): void
    {
        header('Content-type: application/json');
        if (!isset($_GET['id'])) {
            http_response_code(404);
            return;
        }


        $service = new ServiceMapper();
        $service->delete($_GET['id']);
        output($service->getServices());
        http_response_code(200);
    }

    public function serviceAdd(): void
    {
        header('Content-type: application/json');
        if (!isset($_GET['id'])) {
            http_response_code(404);
            return;
        }

        $service = new ServiceMapper();
        output($service->add());
        http_response_code(200);
    }
    public function serviceUpdate()
    {
        header('Content-type: application/json');
        if (!isset($_GET['id']) && !isset($_GET['key']) && !isset($_GET['value'])) {
            http_response_code(404);
            return;
        }

        $service = new ServiceMapper();
        $service->update($_GET['id'],$_GET['key'],$_GET['value']);
        //output($service->getServices());
        http_response_code(200);
    }
}