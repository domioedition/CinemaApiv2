<?php

namespace CinemaApi\Api;

use CinemaApi\Adapter\AdapterInterface;

abstract class AbstractApi
{
    protected $adapter;

    const ENDPOINT = 'http://www.omdbapi.com/?apikey=150f2314';

    protected $endpoint;

    public function __construct(AdapterInterface $adapter, $endpoint = null)
    {
        $this->adapter = $adapter;
        $this->endpoint = $endpoint ?: static::ENDPOINT;

        //add search by title
        $this->endpoint .= "&t=";
    }
}
