<?php

/**
 * Created by PhpStorm.
 * User: Alexandru2292
 * Date: 20.10.2018
 * Time: 14:43
 */
class Strategy
{
    private $strategy;
    public function __construct(NewUser $strategy)
    {
        $this->strategy = $strategy;
    }
    function getUser($name){
        return $this->strategy->newUser($name);
    }
}