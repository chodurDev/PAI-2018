
<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 11.01.2019
 * Time: 19:16
 */
require_once('../../model/ServiceMapper.php');
require_once ('../../outputTableJSON.php');


$servicesPaymentType = new ServiceMapper();

header('Content-type: text/javascript');
http_response_code(200);

output($servicesPaymentType->getServicesPaymentType());
