<?php


namespace CinemaApi\Adapter;

class GuzzleHttpAdapter implements AdapterInterface {

    protected $client;
    protected $response;
    
    function __construct() {
        $this->client = new \GuzzleHttp\Client();
    }
    
    public function test(){
        return 343;
    }


    public function get($url) {
        try {
//            $this->response = $this->client->get($url);
            $this->response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $this->response = $e->getResponse();
//TODO: implement error handler
//            $this->handleError();
            die("error_guzzle cannot start");
        }
        
        return $this->response->getBody();
    }

}
