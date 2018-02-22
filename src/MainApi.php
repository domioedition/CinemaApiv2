<?php

namespace CinemaApi;

use CinemaApi\Adapter\AdapterInterface;
use CinemaApi\Api\Film;


class MainApi
{

//    protected $adapter;

    private function __construct()
    {
//        $this->adapter = $adapter;
    }

    public static function film(AdapterInterface $adapter)
    {
//        $x = new self();
//        var_dump($adapter);
//        die;
        return new Film($adapter);
    }
}
