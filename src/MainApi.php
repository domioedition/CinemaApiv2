<?php

namespace CinemaApi;

use CinemaApi\Adapter\AdapterInterface;
use CinemaApi\Api\Film;


class MainApi{
    
    protected $adapter;

    public function __construct(AdapterInterface $adapter) {
//        echo __FILE__;
        $this->adapter = $adapter;
        
        
        var_dump($this->adapter->get(''));
    }
    
    
    public function film() {
        return new Film($this->adapter);
    }
}
