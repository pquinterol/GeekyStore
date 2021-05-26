<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class getApi extends Controller
{

    public function index()
    {
        $client = new Client([
            'base_uri' => 'http://ec2-54-175-250-200.compute-1.amazonaws.com/',
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', 'public/api/products', ['verify' => false]);
        $posts = json_decode($response->getBody()->getContents());

        return view('api.get' , compact('posts'));
    }

}
