<?php

namespace vendor\model;

trait Validate
{
    public static function validate($data)
    {
        foreach ($data as $value => $methods) {
            $methods = explode('|', $methods);
            foreach ($methods as $method) {
                $method = explode(':', $method);
                if (isset($method[1])) {
                    self::check($method[0]);
                    $method[0] = self::{$method[0]}(($method[1] + 0), $value);
                } else {
                    self::check($method[0]);
                    $method[0] = self::{$method[0]}($value);
                }
                if (!$method[0]) {
                    die('Does not meet the requirement: ' . $value );
                }
            }
        }
    }

    public static function check($value)
    {
        return method_exists(__CLASS__, $value) ?? die("validate($value) method not found");
    }
    public static function username($username)
    {
        return preg_match('/^[a-zA-Z0-9]{5,}$/', $username);
    }
    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public static function password($password)
    {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
    }
    public static function confirmPassword($password, $confirmPassword)
    {
        return $password === $confirmPassword;
    }
    public static function name($name)
    {
        return preg_match('/^[a-zA-Z]{3,}$/', $name);
    }
    public static function phone($phone)
    {
        return preg_match('/^\d{13}$/', $phone);
    }
    public static function string($string)
    {
        return is_string($string);
    }
    public static function number($number)
    {
        return is_numeric($number);
    }
    public static function array($array)
    {
        return is_array($array);
    }
    public static function boolean($boolean)
    {
        return is_bool($boolean);
    }
    public static function null($null)
    {
        return is_null($null);
    }
    public static function object($object)
    {
        return is_object($object);
    }
    public static function resource($resource)
    {
        return is_resource($resource);
    }
    public static function max($max, $value)
    {
        return strlen($value) <= $max;
    }
    public static function min($min, $value)
    {
        return strlen($value) >= $min;
    }
}
