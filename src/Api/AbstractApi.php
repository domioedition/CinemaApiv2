<?php

namespace CinemaApi\Api;

use CinemaApi\Adapter\AdapterInterface;

abstract class AbstractApi{
    
    
    protected $adapter;
    
    
    public function __construct(AdapterInterface $adapter) {
        $this->adapter = $adapter;
    }
    
    
    
    
}
