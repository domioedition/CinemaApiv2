<?php

namespace CinemaApi;

use CinemaApi\Adapter\AdapterInterface;
use CinemaApi\Api\Film;


class MainApi
{

    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function film()
    {
        return new Film($this->adapter);
    }
}
