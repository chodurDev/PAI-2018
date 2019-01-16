<?php
/**
 * Created by PhpStorm.
 * User: Kamil
 * Date: 10.01.2019
 * Time: 20:26
 */

class Car
{

    private $id;
    private $marka;
    private $model;


    public function __construct($id, $marka, $model)
    {
        $this->id = $id;
        $this->marka = $marka;
        $this->model = $model;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getMarka()
    {
        return $this->marka;
    }


    public function setMarka(string $marka): void
    {
        $this->marka = $marka;
    }


    public function getModel()
    {
        return $this->model;
    }


    public function setModel(string $model): void
    {
        $this->model = $model;
    }


}