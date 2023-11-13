<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class apiController extends Controller
{
    public function index()
    {
        $client = new Client();

        $response = $client->request('GET', 'https://sofascores.p.rapidapi.com/v1/search/multi?query=mess&group=teams', [
            'headers' => [
                'X-RapidAPI-Host' => 'sofascores.p.rapidapi.com',
                'X-RapidAPI-Key' => '9daaa05ef1msh871c124d5a45220p11ebe2jsn873cb5278380', // Substitua pelo seu token real da RapidAPI
            ],
        ]);
        
        echo $response->getBody();


        return view('pages/analises');
    }
}
