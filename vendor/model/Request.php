<?php

namespace vendor\model;

trait Request
{
    public static $params = [
        'select' => null,
        'from' => null,
        'where' => null,
        'andwhere' => null,
        'orwhere' => null,
        'group' => null,
        'having' => null,
        'join' => null,
        'leftjoin' => null,
        'order' => null,
        'limit' => null,
    ];

    public static function select($columns)
    {
        $table = static::tableName();
        self::$params[__FUNCTION__] = "SELECT $columns FROM " . $table;
        return new static;
    }

    public static function from($table)
    {
        self::$params[__FUNCTION__] = $table;
        return new static;
    }

    public static function where($condition)
    {
        self::$params[__FUNCTION__] = "WHERE $condition";
        return new static;
    }

    public static function andwhere($condition)
    {
        self::$params[__FUNCTION__] = "AND $condition";
        return new static;
    }

    public static function orwhere($condition)
    {
        self::$params[__FUNCTION__] = "OR $condition";
        return new static;
    }

    public static function order($column, $direction = 'ASC')
    {
        self::$params[__FUNCTION__] = "ORDER BY $column $direction";
        return new static;
    }

    public static function limit($limit, $offset = 0)
    {
        self::$params[__FUNCTION__] = "LIMIT $limit, $offset";
        return new static;
    }

    public static function join($table, $condition)
    {
        self::$params[__FUNCTION__] = "JOIN $table ON $condition";
        return new static;
    }

    public static function group($column)
    {
        self::$params[__FUNCTION__] = "GROUP BY $column";
        return new static;
    }

    public static function having($condition)
    {
        self::$params[__FUNCTION__] = "HAVING $condition";
        return new static;
    }

    public static function query()
    {
        $query = implode(' ', array_filter(self::$params));
        return $query;
    }
}
