<?php

namespace vendor\model;

use database\Database;

abstract class Model extends Database
{

    use Request, Validate;
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
    public static function tableName()
    {
        return static::$table ?? strtolower(static::class);
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

    public static function create($data)
    {
        $stmt = self::$conn->prepare("INSERT INTO " . static::$table . " (" . implode(',', array_keys($data)) . ") VALUES (" . implode(',', array_fill(0, count($data), '?')) . ")");
        $stmt->execute(array_values($data));
        return self::$conn->lastInsertId();
    }

    public static function update($id, $data)
    {
        $stmt = self::$conn->prepare("UPDATE " . static::$table . " SET " . implode('=?,', array_keys($data)) . "=? WHERE id = " . $id);
        $stmt->execute(array_values($data));
    }

    public static function delete($id)
    {
        $stmt = self::$conn->prepare("DELETE FROM " . static::$table . " WHERE id = " . $id);
        $stmt->execute();
    }

    public static function getwhere($column, $value)
    {
        $stmt = self::$conn->prepare("SELECT * FROM " . static::$table . " WHERE " . $column . " = :value");
        $stmt->bindParam(":value", $value, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function get()
    {
        $stmt = self::$conn->prepare("\"".self::query()."\"");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
