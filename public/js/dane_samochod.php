
<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 11.01.2019
 * Time: 19:16
 */
require_once ('../../model/Samochod.php');
require_once ('../../model/SamochodMapper.php');
require_once ('../../model/UslugaMapper.php');


$samochod = new SamochodMapper();
$usluga = new UslugaMapper();



header('Content-type: application/json');
http_response_code(200);



    echo 'data:'.json_encode($samochod->getSamochod());


//foreach ($usluga->getUslugi() as $el) {
//    echo json_encode($el),'<br>';
//
//}
//print_r($usluga->getUslugi());
//echo '--------------------';
//echo $usluga->getUslugi() ? json_encode($usluga->getUslugi()) : '';