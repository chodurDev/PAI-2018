<?php

require_once __DIR__.'/../Database.php';

class ServiceMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }
    public function getUnregulatedServices(){
        $sql = "SELECT * FROM services_view WHERE zaplacone='nie' ORDER BY id DESC ";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $services;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }

    public function getServices($data_wykonania)
    {
        $sql = "SELECT * FROM services_view WHERE data_wykonania= :data_wykonania ORDER BY id DESC ";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->bindParam(':data_wykonania',$data_wykonania,PDO::PARAM_STR);
            $stmt->execute();
            $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $services;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }
    public function delete($id): void
    {
        try {
            $stmt = $this->database->connect()->prepare('DELETE FROM usluga WHERE id = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException $e) {
            die();
        }
    }
    public function add()
    {
        $sql = "SELECT * FROM services_view ORDER BY id DESC LIMIT 1";
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO `usluga` () VALUES ();');//TODO zmodyfikować zapytanie aby wstawiało odpowiednie wartosci poczatkowe
            $stmt->execute();
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            $services = $stmt->fetch(PDO::FETCH_ASSOC);
            return $services;

        }
        catch(PDOException $e) {
            die();
        }
    }

    public function update($id,$key,$value)
    {


        $sql = "UPDATE `usluga` SET "."$key"."="."'"."$value"."'"." WHERE id = "."$id".";";


        try {

            $stmt = $this->database->connect()->prepare($sql);
//            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
//            $stmt->bindParam(':key',$key,PDO::PARAM_STR);
//            $stmt->bindParam(":value",$value,PDO::PARAM_STR);
            $stmt->execute();
            echo $sql;



        }
        catch(PDOException $e) {
            die();
        }
    }




}