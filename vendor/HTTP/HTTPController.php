<?php

namespace vendor\HTTP;

trait HTTPController
{
    public function get($name = null)
    {
        if ($name === null) {
            return $_GET;
        } else {
            return $_GET[$name] ?? null;
        }
    }
}
