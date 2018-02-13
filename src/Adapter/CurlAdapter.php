<?php


namespace CinemaApi\Adapter;


class CurlAdapter implements AdapterInterface
{

    protected $response;

    public function get($url)
    {
        $url = "http://www.omdbapi.com/?apikey=150f2314&t=Shark";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
        curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
//        curl_setopt($ch, CURLOPT_POST, 1); // set POST method
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "url=index%3Dbooks&field-keywords=PHP+MYSQL"); // add POST fields
        $result = curl_exec($ch); // run the whole process
        curl_close($ch);
        return $result;
    }
}