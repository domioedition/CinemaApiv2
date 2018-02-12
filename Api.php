<?php

require __DIR__.'/vendor/autoload.php';



$adapter = new CinemaApi\Adapter\GuzzleHttpAdapter();
//echo $adapter->get(2);


$main = new \CinemaApi\MainApi($adapter);
$film = $main->film();
$film->getFilmInformation();


//$adapter = new \CinemaApi\Adapter\GuzzleHttpAdapter();
//$x->get('1');


//$client = new \GuzzleHttp\Client();
//
//
//var_dump($client);
//$res = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');
//echo $res->getStatusCode();
//// 200
//echo $res->getHeaderLine('content-type');
//// 'application/json; charset=utf8'
//echo $res->getBody();
//// '{"id": 1420053, "name": "guzzle", ...}'
//
//// Send an asynchronous request.
//$request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
//$promise = $client->sendAsync($request)->then(function ($response) {
//    echo 'I completed! ' . $response->getBody();
//});
//$promise->wait();
// 
