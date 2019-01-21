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
        $sql = "SELECT usluga.id,klient.imie,klient.nazwisko,samochod.marka,samochod.model,rodzaj_uslugi.nazwa_uslugi,rodzaj_uslugi.cena,\n"
            . "zaplacone,rodzaj_platnosci.nazwa_platnosci,klient.nip,klient.email,uwagi.tresc_uwagi,data_wykonania \n"
            . "FROM `usluga`\n"
            . "JOIN klient ON usluga.id_klient=klient.id_klient\n"
            . "JOIN samochod ON usluga.id_samochod=samochod.id_samochod\n"
            . "JOIN rodzaj_uslugi ON usluga.id_rodzaj_uslugi=rodzaj_uslugi.id_rodzaj_uslugi\n"
            . "JOIN rodzaj_platnosci ON usluga.id_rodzaj_platnosci=rodzaj_platnosci.id_rodzaj_platnosci\n"
            . "JOIN uwagi ON usluga.id_uwagi=uwagi.id_uwagi WHERE usluga.zaplacone='nie' ORDER BY usluga.id DESC ";
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
        $sql = "SELECT usluga.id,klient.imie,klient.nazwisko,samochod.marka,samochod.model,rodzaj_uslugi.nazwa_uslugi,rodzaj_uslugi.cena,\n"
            . "zaplacone,rodzaj_platnosci.nazwa_platnosci,klient.nip,klient.email,uwagi.tresc_uwagi,data_wykonania \n"
            . "FROM `usluga`\n"
            . "JOIN klient ON usluga.id_klient=klient.id_klient\n"
            . "JOIN samochod ON usluga.id_samochod=samochod.id_samochod\n"
            . "JOIN rodzaj_uslugi ON usluga.id_rodzaj_uslugi=rodzaj_uslugi.id_rodzaj_uslugi\n"
            . "JOIN rodzaj_platnosci ON usluga.id_rodzaj_platnosci=rodzaj_platnosci.id_rodzaj_platnosci\n"
            . "JOIN uwagi ON usluga.id_uwagi=uwagi.id_uwagi WHERE usluga.data_wykonania= :data_wykonania ORDER BY usluga.id DESC ";
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
        $sql = "SELECT usluga.id,klient.imie,klient.nazwisko,samochod.marka,samochod.model,rodzaj_uslugi.nazwa_uslugi,rodzaj_uslugi.cena,\n"
            . "zaplacone,rodzaj_platnosci.nazwa_platnosci,klient.nip,klient.email,uwagi.tresc_uwagi,data_wykonania \n"
            . "FROM `usluga`\n"
            . "JOIN klient ON usluga.id_klient=klient.id_klient\n"
            . "JOIN samochod ON usluga.id_samochod=samochod.id_samochod\n"
            . "JOIN rodzaj_uslugi ON usluga.id_rodzaj_uslugi=rodzaj_uslugi.id_rodzaj_uslugi\n"
            . "JOIN rodzaj_platnosci ON usluga.id_rodzaj_platnosci=rodzaj_platnosci.id_rodzaj_platnosci\n"
            . "JOIN uwagi ON usluga.id_uwagi=uwagi.id_uwagi  ORDER BY usluga.id DESC";
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO `usluga` () VALUES ();');
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