<?php

/**
 * Created by PhpStorm.
 * User: Alexandru2292
 * Date: 20.10.2018
 * Time: 14:42
 */
class File implements NewUser
{
    public function newUser($name)
    {
        return "this is new User with name: ".$name." salvat in File";
    }
}