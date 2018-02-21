<?php



class AdapterTest implements \CinemaApi\Adapter\AdapterInterface{
    
    public function get($url = null) {
        
        
        $arr = [
            
            'title'=>'Green mile',
            'year'=>'1993',
            'poster'=>'someimage',
            'imdbid'=>'tt234234',
            'imdbrating'=>'9,2',
            'response'=>'true',
        ];
        
        
        return json_encode($arr);
        
    }
    
}