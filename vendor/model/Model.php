<?php

namespace vendor\model;

use database\Database;
use vendor\session\Session;

Session::start();
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
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function count()
    {
        self::check();
        $stmt = self::$conn->prepare("SELECT COUNT(*) as count FROM " . static::$table);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ)->count;
    }

    public static function countId($name, $value)
    {
        self::check();
        $stmt = self::$conn->prepare("SELECT COUNT(*) as count FROM " . static::$table . " WHERE $name = :value");
        $stmt->bindParam('value', $value);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ)->count;
    }

    public static function findOne($id)
    {
        self::check();
        $stmt = self::$conn->prepare("SELECT * FROM " . static::$table . " WHERE id = " . $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function findName($column, $name)
    {
        self::check();
        $stmt = self::$conn->prepare("SELECT * FROM " . static::$table . " WHERE $column = :name");
        $stmt->bindParam('name', $name);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function create($data)
    {
        self::check();
        $stmt = self::$conn->prepare("INSERT INTO " . static::$table . " (" . implode(',', array_keys($data)) . ") VALUES (" . implode(',', array_fill(0, count($data), '?')) . ")");
        $stmt->execute(array_values($data));
        return self::$conn->lastInsertId();
    }

    public static function update($id, $data)
    {
        self::check();

        // "key=?" formatidagi array hosil qilamiz
        $fields = implode(', ', array_map(function ($key) {
            return "$key = ?";
        }, array_keys($data)));

        // Tayyor SQL
        $sql = "UPDATE " . static::$table . " SET $fields WHERE id = ?";

        $stmt = self::$conn->prepare($sql);

        // Parametrlar: $data qiymatlari + $id
        $params = array_values($data);
        $params[] = $id;

        $stmt->execute($params);
    }


    public static function delete($id)
    {
        self::check();
        $stmt = self::$conn->prepare("DELETE FROM " . static::$table . " WHERE id = " . $id);
        $stmt->execute();
    }

    public static function getwhere($column, $value)
    {
        self::check();
        $stmt = self::$conn->prepare("SELECT * FROM " . static::$table . " WHERE " . $column . " = :value");
        $stmt->bindParam(":value", $value, \PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function get()
    {
        self::check();
        $stmt = self::$conn->prepare(self::query());
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function all()
    {
        self::check();
        $stmt = self::$conn->prepare(self::query());
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function auth()
    {
        self::check();
        if (Session::get('user_id') !== null) {
            $stmt = self::$conn->prepare("SELECT * FROM " . static::$table . " WHERE id = :user_id");
            $stmt->bindParam(':user_id', Session::get('user_id'));
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_OBJ) ?? false;
        }
    }
}
