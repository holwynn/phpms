<?php

/**
* MapleDatabase.php
*/
class MapleDatabase
{
    private function __construct() {}

    static function connect()
    {
        global $maple_database;

        $host = $maple_database['SERVER_DATABASE_HOST'];
        $dbname = $maple_database['SERVER_DATABASE_DBNAME'];
        $username = $maple_database['SERVER_DATABASE_USERNAME'];
        $password = $maple_database['SERVER_DATABASE_PASSWORD'];
        $port = $maple_database['SERVER_DATABASE_PORT'];

        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ); 

        $link = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbname,
					    $username,
					    $password,
                        $options
                        );
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $link;
    }
}