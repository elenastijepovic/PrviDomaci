<?php

class Trainer
{
    public $id; //bigint
    public $nameSurname;
    public $specialization;
    private $connection;
    private $tableName ="trainer";

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function loadTrainers()
    {

        $sql = "SELECT * FROM " . $this->tableName;

        $res = $this->connection->query($sql);

        $trainerArray = [];
        if ($res->num_rows > 0) {
            while ($red = $res->fetch_assoc()) {
                array_push($trainerArray, $red);
            }
        }

        return $trainerArray;
    }

    public function addTrainer()
    {
        $sql = "INSERT INTO " . $this->tableName . " (nameSurname,specialization) VALUES ('" . $this->nameSurname . "','" . $this->specialization . "')";


        if ($this->connection->query($sql)){
            return true;
            echo "New trainer added";

        }
           

        return false;
    }
}