<?php

namespace vendor\model;

trait Request
{
    public static function select()
    {
        echo "This is a request from the Request trait.";
    }
}