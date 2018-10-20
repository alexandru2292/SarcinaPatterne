<?php


class Connect
{
    private static $_db = null;

    public static function getInstance(){
        if(self::$_db === null){
            self::$_db = new PDO('mysql:host=localhost;dbname=Sarcina', 'root', '');
        }//daca $_db  e null creaza obiectului lui PDO daca nu
        // intoarce deodata la fel obiectul lui PDO deoarce in cazul dat alt obiect nu poate exista, nu se poate crea si nici clona
        // si nici alte functii nu avem de creare .. in asta si consta Singleton
        return self::$_db;
    }
    /* Limitam posibilitatea de creare a obiectului sau clonarea lui a  acestui class */
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}
}