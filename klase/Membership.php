<?php

class Membership
{


    private $connection;
    private $tableName = "membership";
    public $id; // int
    public $nameSurname;
    public $email;
    public $telephone;
    public $membershipType;
    public $date;
    public $trainerId;

    public $order_by = "id";

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function loadMemberships()
    {

        $sql = "SELECT * FROM " . $this->tableName . " ORDER BY " . $this->order_by;
        
        $res = $this->connection->query($sql);
        $list = [];
        if ($res->num_rows > 0) {
            while ($red = $res->fetch_assoc()) {
                $red['trainerId'] =  $this->getTrainerByID($red['trainerId']);
                array_push($list, $red);
            }
            return $list;
        }
    }

    private function getTrainerByID($id)
    {
        $sql = "SELECT * FROM trainer WHERE  id = " . $id;
        $res = $this->connection->query($sql);

        if ($res->num_rows > 0) {
            return $res->fetch_assoc()['nameSurname'];
        }
    }

    public function loadMembershipsForClient()
    {

        $sql = "SELECT * FROM " . $this->tableName . " WHERE  email = '" . $this->email . "' ORDER BY " . $this->order_by;

        $res = $this->connection->query($sql);
        $list = [];
        if ($res->num_rows > 0) {
            while ($red = $res->fetch_assoc()) {
                $red['email'] =  $this->email;
                array_push($list, $red);
            }
            return $list;
        }
    }
  
public function loadSoonExpired(){

    $sql = "SELECT * FROM " . $this->tableName . "  WHERE NOW() + INTERVAL 7 DAY>=DATE ORDER BY " . $this->order_by;

    $res = $this->connection->query($sql);
    $array = [];

    if ($res->num_rows) {
        while ($red = $res->fetch_assoc()) {
            array_push($array, $red);
        }
        return $array;
    }

}
    public function addMembership()
    {

        $sql = "INSERT INTO " . $this->tableName . "(nameSurname,email,telephone,membershipType,date,trainerId) VALUES ('" . $this->nameSurname . "','" . $this->email . "','" . $this->telephone . "','" . $this->membershipType ."','" . $this->date . "'," . $this->trainerId .")";


        if ($this->connection->query($sql))
            return true;

        return false;
    }
    //FALI OVO
    public function update()
    {
        $sql = "UPDATE " . $this->tableName . " SET date = '" . $this->date. "' WHERE id= " . $this->id;
        if ($this->connection->query($sql))
            return true;

        return false;
    }

    public function deleteMembershipByID()
    {

        $sql = "DELETE FROM " . $this->tableName . " WHERE id=" . $this->id;

        if ($this->connection->query($sql))
            return true;
        return false;
    }
}