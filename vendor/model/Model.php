<?php

namespace vendor\model;

use database\Database;

abstract class Model extends Database
{

    use \vendor\model\Request;

    protected static $table = null;
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

    private static function check()
    {
        if (!static::$table) {
            throw new \Exception("Table name is not defined in the child class.");
        }

        if (!isset(self::$conn)) {
            self::getConnaction();
        }
    }

    public static function getAll()
    {
        self::check();
        $stmt = self::$conn->prepare("SELECT * FROM " . static::$table);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function findOne($id)
    {
        self::check();

        $stmt = self::$conn->prepare("SELECT * FROM " . static::$table . " WHERE id = " . $id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function findName($column, $name)
    {
        self::check();
        
        $stmt = self::$conn->prepare("SELECT * FROM " . static::$table . " WHERE $column = :name");
        $stmt->bindParam('name', $name);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
