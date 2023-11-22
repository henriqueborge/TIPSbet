<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\models\odds;
use Illuminate\Support\Facades\Http;


class apiController extends Controller
{
    public function index()
{
    $apiKey = 'c9e5bd947c6e6ea9d02d5ffa4ee42fe8';
    $url = 'https://api.the-odds-api.com/v4/sports/americanfootball_nfl/odds/';
    
    $response = Http::get($url, [
        'apiKey' => $apiKey,
        'regions' => 'us',
        'markets' => 'h2h,spreads',
        'oddsFormat' => 'american',
    ]);

    $data = $response->json();
    

    // Salvar no banco de dados
    foreach ($data as $item) {
        $odds = new Odds();
        $odds->home_team= $item['home_team'];
        $odds->away_team= $item['away_team'];
        $odds->odds= $item['bookmakers'][0]['markets'][0]['outcomes'][0]['price'];
        $odds->odd_visitante= $item['bookmakers'][1]['markets'][1]['outcomes'][1]['price'];
        $commence_time_timestamp = strtotime($item['commence_time']);
        $odds->commence_time = date('Y-m-d H:i:s', $commence_time_timestamp);
        $odds->save();

    } 
    

    // Recuperar os dados salvos
    $odds = odds::all();
    
    return view('pages.Analises', compact('odds'));
}

}
