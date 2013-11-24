<?php

namespace attitude\Elements;

class Auth_Element
{
    protected static $instance = null;

    private $authorized = false;
    private $version    = null;

    protected function __construct($authorization)
    {
        return $this;
    }

    public function isAuthorized()
    {
        return !! $this->authorized;
    }

    public function appVersion()
    {
        return $this->version;
    }

    public static function instance($authorization)
    {
        if (!is_string($authorization)) {
            $authorization = '';
        }

        return static::$instance===null ? new self($authorization) : self::$instance;
    }
}
