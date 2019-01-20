
<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 11.01.2019
 * Time: 19:16
 */
require_once('../../model/Car.php');
require_once('../../model/CarMapper.php');
require_once ('../../outputTableJSON.php');


$carMarka = new CarMapper();

header('Content-type: text/javascript');
http_response_code(200);

output($carMarka->getMarka());
