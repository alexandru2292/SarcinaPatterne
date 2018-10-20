<?php


//Acesta este doar un exemplu,,, iaru DB este realizat pe baza de Singleton
class Singleton{
    protected static $instance; // in $instance vom pastra o oarecare valoare sau obiectul unei clase la care vrem sa obtinem acces dintrul alt loc al programei


    public static function getInstance(){
        if(!isset(self::$instance)){ // daca in instance nui nimic
            $class = __CLASS__; // $class va fi Singleton
            self::$instance = new $class;  // se va crea obiectul clasului singleton
            echo '<p>First initialization</p>';
        }else{ // daca deja a fost odata initializata atunci nu se va crea dar se va returna cel obiectul existent
            echo '<p> ... initialization</p>';
        }
        return self::$instance;
    }
    
    /* Limitam posibilitatea de creare a obiectului sau clonarea lui a  acestui class */
    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

}
//Am obtinut o singura instanta a clasului dat
Singleton::getInstance(); // First initialization
Singleton::getInstance(); // ... initialization
Singleton::getInstance(); // ... initialization