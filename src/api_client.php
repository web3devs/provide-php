<?php

class APIClient {

    const DEFAULT_SCHEME = 'https';
    const DEFAULT_VERSION = 'v1';

    function __construct($scheme, $host, $token) {
        $this->base_url = $scheme."://".$host."/api/v1/";
        $this->token = $token;

        $headers = [
            'authorization' => 'bearer '.$this->token,
            'Content-Type' => 'application/x-www-form-urlencoded'
        ];

        $this->client = new GuzzleHttp\Client(['headers'=>$headers]);
    }

    function get($uri, $params=null) {
        $res = $this->client->request('GET', $this->base_url.$uri);
        $response = json_decode($res->getBody());
        
        return $response;
    }

    function post($uri, $params) {
	    $res = $this->client->post($this->base_url.$uri, [
			GuzzleHttp\RequestOptions::JSON => $params
		]);
        $response = json_decode($res->getBody());
        
        return $response;
    }

    function put($uri, $params) {
        
    }

    function delete($uri) {

    }

}