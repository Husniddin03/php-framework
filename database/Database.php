<?php

namespace database;

abstract class Database
{
    public static function getDBCredentials()
    {
        return [
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'dbname'   => 'quiz'
        ];
    }
}