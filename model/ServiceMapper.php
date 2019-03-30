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
        $sql = "SELECT * FROM services_view WHERE zaplacone='nie' ORDER BY data_wykonania DESC ";
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
    public function getServicesTypeCount($from,$to)
    {
        $sql = "SELECT rodzaj_uslugi.nazwa_uslugi,COUNT(usluga.id_rodzaj_uslugi) liczba_wykonanych_uslug,SUM(usluga.cena) suma_kwot_platnosci FROM `usluga`LEFT join rodzaj_uslugi on usluga.id_rodzaj_uslugi=rodzaj_uslugi.id_rodzaj_uslugi WHERE usluga.id_rodzaj_uslugi > 0 AND data_wykonania BETWEEN '".$from."' AND '".$to."' GROUP by rodzaj_uslugi.nazwa_uslugi ";


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
    public function getServicesPaymentTypeCount($from,$to)
    {
        $sql = "SELECT rodzaj_platnosci.nazwa_platnosci,COUNT(usluga.id_rodzaj_platnosci) liczba_wykonanych_platnosci,SUM(usluga.cena) suma_kwot_platnosci FROM `usluga`LEFT join rodzaj_platnosci on usluga.id_rodzaj_platnosci=rodzaj_platnosci.id_rodzaj_platnosci WHERE usluga.id_rodzaj_platnosci > 0 AND data_wykonania BETWEEN '".$from."' AND '".$to."'  GROUP by rodzaj_platnosci.nazwa_platnosci";


        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            $servicesPaymentType = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $servicesPaymentType;
        }
        catch(PDOException $e) {
            die( 'sie nie udało: ' . $e->getMessage());
        }
    }

    public function getServicesPaid($from,$to)
    {
        $sql = "SELECT zaplacone,COUNT(usluga.id) liczba_zaplaconych,SUM(usluga.cena) kwota_zaplaconych FROM `usluga` where zaplacone<>'wprowadz dane' AND data_wykonania BETWEEN '".$from."' AND '".$to."' GROUP BY zaplacone";


        try {
            $stmt = $this->database->connect()->prepare($sql);
            $stmt->execute();
            $servicesPaid = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $servicesPaid;
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
    public function add($data_wykonania)//todo spróbowac naprawić wyswietlania podczas dodawania jeśli nie zostanie ani jeden element danego dnia
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

                if($proba['id_' . $tabela_nazwa] == 0){
                        $stmt = $this->database->connect()->prepare($sql_two);
                        $stmt->execute();
                        $proba2 = $stmt->fetch(PDO::FETCH_ASSOC);
                        echo "sql_two " . $sql_two . "\n";

                        if ($proba2 == false) {
                            echo "robimy insercik i updejcik\n";
                                $stmt = $this->database->connect()->prepare($sqlInsert);
                                $stmt->execute();
                                $stmt = $this->database->connect()->prepare($sqlUpdateUsluga);
                                $stmt->execute();

                        } else {
                            $sqlUpdate = "UPDATE usluga SET id_" . $tabela_nazwa . "=" . $proba2['id_' . $tabela_nazwa] . " WHERE id=" . $id . ";";
                            $stmt = $this->database->connect()->prepare($sqlUpdate);
                            $stmt->execute();
                        }

                }else{
                        if($tabela_nazwa=='klient') {
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

//todo zrobic trigger jezeli  po usunieciu pustego rekordu nie bedzie  rekordu na dany dzien to utworzyc taki pusty rekord w tabeli uslugi


}