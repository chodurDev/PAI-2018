<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 10.01.2019
 * Time: 20:31
 */

require_once 'Samochod.php';
require_once __DIR__.'/../Database.php';

class SamochodMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getSamochod()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT * FROM samochod ;');
            $stmt->execute();

            $samochod = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $samochod;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }


}