<?php

class DB implements NewUser{

    public $_db = null;
    public function __construct()
    {
        /* Daca nu era Db::getInstance() in contructor ca param trebuia indicat $db care venea din index.php  $db = new PDO("....");
            Astfel avem doar o simpla instanta care vin in Db::getInstance si e ft usor cu ea o conectam oriunde */
        $this->_db = Connect::getInstance();// iar aici am conectat obiectul clasului PDO care face leg cu baza de date  creat in getInstance
    }

    public function getAllUser(){
        $result = $this->_db->query("SELECT * FROM `users`");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertUser($name, $email){
        $sql = "INSERT INTO `users` (name, email) VALUES (?,?)";
        $stmt= $this->_db->prepare($sql);
        $stmt->execute([$name, $email]);
    }
    public function deleteUser($id){
        $sql = "DELETE FROM `users` WHERE id=$id";
        $this->_db->exec($sql);
    }
    public function newUser($name)
    {
        return " Acest user $name este salvat in DB";
    }
}