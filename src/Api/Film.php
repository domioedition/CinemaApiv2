<?php

namespace CinemaApi\Api;

class Film extends AbstractApi{
    
    
    
    public function getFilmInformation() {
//        echo "Class: ".__CLASS__;
//        var_dump($this->adapter);
        
        $filmInfo = $this->adapter->get(100);
        
        
//        var_dump($filmInfo);
    }
}
