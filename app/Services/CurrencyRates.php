<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;

class CurrencyRates
{

    public static function getRates()
    {
//        $client = new Client();
//        $response = $client->request('GET', 'https://api.exchangeratesapi.io/latest?base=RUB');
//        if ($response->getStatusCode() !== 200) {
//            throw new \Exception('Problem with currency Rates');
//        }
//        $body = $response->getBody()->getContents();
        dd(Carbon::now()->startOfSecond()->toString());
    }

}
