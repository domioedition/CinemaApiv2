<?php


namespace CinemaApi\Adapter;

use CinemaApi\Exception\HttpException;
use GuzzleHttp\Exception\RequestException;

class GuzzleHttpAdapter implements AdapterInterface
{

    protected $client;
    protected $response;

    function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    public function get($url)
    {
        try {
            $this->response = $this->client->request('GET', $url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }
        return $this->response->getBody();
    }

    public function handleError()
    {

        //TODO: finish error handler

        $body = (string)$this->response->getBody();
        $code = (int)$this->response->getStatusCode();

        $content = json_decode($body);

        echo "HTTP status code: " . $code;

        if ($content->Response == 'False') {
            throw new HttpException($content->Error);
        }
    }

}
