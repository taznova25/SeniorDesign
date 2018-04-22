<?php
function connect_to_db()
{
    //define("username", "taznova25");
    define("username", "root");
    //define("Password", "Helpdesk1@");
    define("Password", "");
    //define ("DB", "seniordesgin");
    define ("DB", "seniordesign");
    // connect to db
    $connection=new mysqli('localhost',username,Password,DB);
        if ($connection->connect_error){
            die('connect Error (' . $connection->connect_errno .')'

            . $connection->connect_error);
    }
    return $connection;
}


?>