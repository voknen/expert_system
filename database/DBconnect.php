<?php
class DBconnect 
{
    public function connect()
    {
        return new PDO('mysql:host=localhost;dbname=expert_system','root','', 
        				array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
}  