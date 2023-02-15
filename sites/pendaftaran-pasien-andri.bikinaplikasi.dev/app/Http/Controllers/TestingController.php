<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://wordpress.org/themes/browse/new/', [
            
        ]);
        
        echo $res->getBody()->getContents();
        
        echo 
    }
}
