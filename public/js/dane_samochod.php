
<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 11.01.2019
 * Time: 19:16
 */
require_once ('../../model/Samochod.php');
require_once ('../../model/SamochodMapper.php');

$samochod = new SamochodMapper();


//header('Content-type: application/json');
//http_response_code(200);


foreach ($samochod->getSamochod() as $el) {
    echo json_encode($el),'<br>';
}