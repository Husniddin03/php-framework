<?php

namespace database;

trait Database
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
    
    protected static $conn = null;

    public static function getConnaction()
    {
        if (!isset(self::$conn)) {
            try {
                $db = self::getDBCredentials();
                self::$conn = new \PDO(
                    "mysql:host=" . $db['hostname'] . ";dbname=" . $db['dbname'],
                    $db['username'],
                    $db['password']
                );
                self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die($e->getMessage());
            }
        }
    }
}
