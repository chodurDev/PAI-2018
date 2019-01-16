<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 10.01.2019
 * Time: 20:31
 */

require_once 'Car.php';
require_once __DIR__.'/../Database.php';

class CarMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getModel()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT model FROM samochod ;');
            $stmt->execute();

            $samochod = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $samochod;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }
    public function getMarka()
    {
        try {
            $stmt = $this->database->connect()->prepare('SELECT marka FROM samochod ;');
            $stmt->execute();

            $samochod = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $samochod;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }


}