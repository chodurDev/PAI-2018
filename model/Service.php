<?php

class Service
{
    private $id;
    private $imie;
    private $nazwisko;
    private $samochod_marka;
    private $samochod_model;
    private $rodzaj_services;
    private $cena;
    private $Zaplacone;
    private $rodzaj_platnosci;
    private $nip;
    private $email;
    private $uwagi;
    private $data_wykonania;


    public function __construct($id, $imie, $nazwisko, $samochod_marka, $samochod_model, $rodzaj_services, $cena, $Zaplacone, $rodzaj_platnosci, $nip, $email, $uwagi, $data_wykonania)
    {
        $this->id = $id;
        $this->imie = $imie;
        $this->nazwisko = $nazwisko;
        $this->samochod_marka = $samochod_marka;
        $this->samochod_model = $samochod_model;
        $this->rodzaj_services = $rodzaj_services;
        $this->cena = $cena;
        $this->zaplacone = $Zaplacone;
        $this->rodzaj_platnosci = $rodzaj_platnosci;
        $this->nip = $nip;
        $this->email = $email;
        $this->uwagi = $uwagi;
        $this->data_wykonania = $data_wykonania;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param mixed $imie
     */
    public function setImie($imie): void
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param mixed $nazwisko
     */
    public function setNazwisko($nazwisko): void
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return mixed
     */
    public function getCarMarka()
    {
        return $this->samochod_marka;
    }

    /**
     * @param mixed $samochod_marka
     */
    public function setSamochodMarka($samochod_marka): void
    {
        $this->samochod_marka = $samochod_marka;
    }

    /**
     * @return mixed
     */
    public function getCarModel()
    {
        return $this->samochod_model;
    }

    /**
     * @param mixed $samochod_model
     */
    public function setSamochodModel($samochod_model): void
    {
        $this->samochod_model = $samochod_model;
    }

    /**
     * @return mixed
     */
    public function getRodzajservices()
    {
        return $this->rodzaj_services;
    }

    /**
     * @param mixed $rodzaj_services
     */
    public function setRodzajservices($rodzaj_services): void
    {
        $this->rodzaj_services = $rodzaj_services;
    }

    /**
     * @return mixed
     */
    public function getCena()
    {
        return $this->cena;
    }

    /**
     * @param mixed $cena
     */
    public function setCena($cena): void
    {
        $this->cena = $cena;
    }

    /**
     * @return mixed
     */
    public function getZaplacone()
    {
        return $this->zaplacone;
    }

    /**
     * @param mixed $Zaplacone
     */
    public function setZaplacone($Zaplacone): void
    {
        $this->zaplacone = $Zaplacone;
    }

    /**
     * @return mixed
     */
    public function getRodzajPlatnosci()
    {
        return $this->rodzaj_platnosci;
    }

    /**
     * @param mixed $rodzaj_platnosci
     */
    public function setRodzajPlatnosci($rodzaj_platnosci): void
    {
        $this->rodzaj_platnosci = $rodzaj_platnosci;
    }

    /**
     * @return mixed
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * @param mixed $nip
     */
    public function setNip($nip): void
    {
        $this->nip = $nip;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }

    /**
     * @param mixed $uwagi
     */
    public function setUwagi($uwagi): void
    {
        $this->uwagi = $uwagi;
    }

    /**
     * @return mixed
     */
    public function getDataWykonania()
    {
        return $this->data_wykonania;
    }

    /**
     * @param mixed $data_wykonania
     */
    public function setDataWykonania($data_wykonania): void
    {
        $this->data_wykonania = $data_wykonania;
    }


}