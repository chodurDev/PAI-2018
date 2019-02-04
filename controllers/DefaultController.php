<?php

require_once "AppController.php";

require_once __DIR__.'/../model/User.php';
require_once __DIR__.'/../model/UserMapper.php';


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';

        $this->render('index', ['text' => $text]);
    }
    public function start(){
        $text = '';
        $this->render('start', ['text' => $text]);

    }

    public function login()
    {
        $mapper = new UserMapper();

        $user = null;

        if ($this->isPost() && isset($_POST['email'])){

            $user = $mapper->getUser($_POST['email']);

            if(!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

            if ($user->getPassword() !== $_POST['password']) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $user->getId();
                $_SESSION["role"] = $user->getRole();

                $url = "http://$_SERVER[HTTP_HOST]/";



                if($_SESSION["role"]=="admin") {
                    header("Location: {$url}?page=admin");

                }else{
                    header("Location: {$url}?page=index");
                }

                exit();

            }
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['text' => 'You have been successfully logged out!']);
    }
}