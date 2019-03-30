<?php

require_once 'controllers/DefaultController.php';
require_once 'controllers/AdminController.php';


class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'start' => [
                'controller' => 'DefaultController',
                'action' => 'start'
            ],
            'index' => [
                'controller' => 'DefaultController',
                'action' => 'index'
            ],
            'login' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'admin_users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'admin_delete_user' => [
                'controller' => 'AdminController',
                'action' => 'userDelete'
            ],
            'adminCRM' => [
                'controller' => 'AdminController',
                'action' => 'adminCRM'
            ],
            'adminRaport' => [
                'controller' => 'AdminController',
                'action' => 'adminRaport'
            ],
            'admin_services' => [
                'controller' => 'AdminController',
                'action' => 'services'
            ],
            'adminUnregulated' => [
                'controller' => 'AdminController',
                'action' => 'adminUnregulated'
            ],
            'admin_servicesUnregulated' => [
                'controller' => 'AdminController',
                'action' => 'admin_servicesUnregulated'
            ],
            'adminServiceDelete' => [
                'controller' => 'AdminController',
                'action' => 'serviceDelete'
            ],
            'adminServiceAdd' => [
                'controller' => 'AdminController',
                'action' => 'serviceAdd'
            ],
            'adminServiceUpdate' => [
                'controller' => 'AdminController',
                'action' => 'serviceUpdate'
            ],
            'ServiceTypeCount' => [
                'controller' => 'AdminController',
                'action' => 'serviceTypeCount'
            ],
            'ServicePaymentTypeCount' => [
                'controller' => 'AdminController',
                'action' => 'servicePaymentTypeCount'
            ],
            'ServicePaid' => [
                'controller' => 'AdminController',
                'action' => 'servicePaid'
            ]

        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
            && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'start';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}