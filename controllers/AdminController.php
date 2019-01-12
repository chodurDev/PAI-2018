<?php
require_once 'AppController.php';

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';
require_once __DIR__.'/../model/Samochod.php';
require_once __DIR__.'/../model/SamochodMapper.php';

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
    public function adminNiezaplacone():void
    {
        $user = new UserMapper();
        $this->render('adminNiezaplacone', ['user' => $user->getUser($_SESSION['id'])]);
    }
    //--------------------------------------


    public function users(): void
    {
        $user = new UserMapper();

        header('Content-type: application/json');
        http_response_code(200);

        echo $user->getUsers() ? json_encode($user->getUsers()) : '';
    }

    public function userDelete(): void
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }

        $user = new UserMapper();
        $user->delete((int)$_POST['id']);

        http_response_code(200);
    }
}