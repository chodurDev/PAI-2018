<?php

require_once __DIR__.'/../Database.php';

class UslugaMapper
{
    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getUslugi()
    {
        $sql = "SELECT klient.imie,klient.nazwisko,samochod.marka,samochod.model,rodzaj_uslugi.nazwa_uslugi,rodzaj_uslugi.cena,\n"

            . "zaplacone,rodzaj_platnosci.nazwa_platnosci,klient.nip,klient.email,uwagi.tresc_uwagi,data_wykonania \n"

            . "FROM `usluga`\n"

            . "JOIN klient ON usluga.id_klient=klient.id_klient\n"

            . "JOIN samochod ON usluga.id_samochod=samochod.id_samochod\n"

            . "JOIN rodzaj_uslugi ON usluga.id_rodzaj_uslugi=rodzaj_uslugi.id_rodzaj_uslugi\n"

            . "JOIN rodzaj_platnosci ON usluga.id_rodzaj_platnosci=rodzaj_platnosci.id_rodzaj_platnosci\n"

            . "JOIN uwagi ON usluga.id_uwagi=uwagi.id_uwagi";
        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            $uslugi = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $uslugi;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }


}