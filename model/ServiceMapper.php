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
        $sql = "SELECT * from services_view where data_wykonania=:data_wykonania ";


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

    public function getServicesType()
    {
        $sql = "SELECT concat(nazwa_uslugi,\" \",cena) as nazwa_uslugi from rodzaj_uslugi where id_rodzaj_uslugi>0 ";


        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            $servicesType = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $servicesType;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }
    public function getServicesPaymentType()
    {
        $sql = "SELECT nazwa_platnosci from rodzaj_platnosci where id_rodzaj_platnosci>0 ";


        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            $servicesType = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $servicesType;
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
    public function add($data_wykonania)
    {
        $sql = "SELECT * FROM services_view ORDER BY id DESC LIMIT 1";
        try {
            $stmt = $this->database->connect()->prepare('INSERT INTO usluga (data_wykonania) VALUES (:data_wykonania);');
            $stmt->bindParam(':data_wykonania',$data_wykonania,PDO::PARAM_STR);
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

        switch ($key){

            case "nazwisko_imie":
                $tabela_nazwa='klient';
                break;
            case "nip":
                $tabela_nazwa='klient';
                break;
            case "email":
                $tabela_nazwa='klient';
                break;
            case "nazwa_samochod":
                $tabela_nazwa='samochod';
                break;
            case "nazwa_uslugi":
                $tabela_nazwa='rodzaj_uslugi';
                $value=strtok($value," ");
                break;
            case "nazwa_platnosci":
                $tabela_nazwa='rodzaj_platnosci';
                break;
            case "tresc_uwagi":
                $tabela_nazwa='uwagi';
                break;
            case "zaplacone":
                $tabela_nazwa='usluga';
                break;
            case "cena":
                $tabela_nazwa='usluga';
                break;
        }


        $sql_one="SELECT id_".$tabela_nazwa." FROM ".$tabela_nazwa." RIGHT JOIN usluga USING(id_".$tabela_nazwa.") WHERE id=".$id.";";
        $sql_two="SELECT id_".$tabela_nazwa." FROM ".$tabela_nazwa." WHERE ".$key."='".$value."';";
        

        $sqlInsert="INSERT INTO ".$tabela_nazwa." (".$key.") VALUES ('".$value."');";
        $sqlUpdateUsluga="UPDATE usluga SET id_".$tabela_nazwa."=(SELECT id_".$tabela_nazwa." FROM ".$tabela_nazwa." WHERE ".$key."='".$value."') WHERE id=".$id.";";
        try {
            if(!($key=='zaplacone' || $key=='cena')) {
                $stmt = $this->database->connect()->prepare($sql_one);
                $stmt->execute();
                $proba = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "sql_one " . $sql_one . "\n";
                if ($proba['id_' . $tabela_nazwa] == 0) {
                        $stmt = $this->database->connect()->prepare($sql_two);
                        $stmt->execute();
                        $proba2 = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "sql_two " . $sql_two . "\n";
                        if ($proba2 == false) {
                                $stmt = $this->database->connect()->prepare($sqlInsert);
                                $stmt->execute();
                                $stmt = $this->database->connect()->prepare($sqlUpdateUsluga);
                                $stmt->execute();

                        } else {
                            $sqlUpdate = "UPDATE usluga SET id_" . $tabela_nazwa . "=" . $proba2['id_' . $tabela_nazwa] . " WHERE id=" . $id . ";";
                            $stmt = $this->database->connect()->prepare($sqlUpdate);
                            $stmt->execute();
                        }

                }else {
                        if($key=='nazwisko_imie') {
                            $sql = "UPDATE " . $tabela_nazwa . " SET " . $key . "=" . "'" . $value . "' WHERE id_" . $tabela_nazwa . " = " . $proba['id_' . $tabela_nazwa] . ";";
                            echo "sql_update " . $sql . "\n";
                            $stmt = $this->database->connect()->prepare($sql);
                            $stmt->execute();
                        }
                        $stmt = $this->database->connect()->prepare($sqlUpdateUsluga);
                        $stmt->execute();
                        echo $sqlUpdateUsluga;


                }

            }else{
                $stmt = $this->database->connect()->prepare("UPDATE usluga SET " . $key . "='" . $value . "' WHERE id=" . $id . ";");
                $stmt->execute();
            }

        }

        catch(PDOException $e) {
            die();
        }
    }




}