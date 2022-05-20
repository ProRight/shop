<?php

namespace App\Services;

use App\Models\Currency;
use GuzzleHttp\Client;

class CurrencyConvert
{

    protected static $currencies;

    public static function loadCurrencies()
    {
        if (is_null(self::$currencies)) {
            $currencies = Currency::all();
            foreach ($currencies as $currency) {
                self::$currencies[$currency->code] = $currency;
            }
        }
    }

    public static function getCurrencies()
    {
        self::loadCurrencies();
        return self::$currencies;
    }

    public static function getCurrencyFromSession()
    {
        return session('currency', 'RUB');
    }

    public static function getCurrentCurrencyFromSession()
    {
        self::loadCurrencies();
        $currencyCode = self::getCurrencyFromSession();
        foreach (self::$currencies as $currency) {
            if ($currency->code === $currencyCode) {
                return $currency;
            }
        }
    }

    public static function convert($sum, $originalCurrencyCode = 'RUB', $targetCurrencyCode = null)
    {
        self::loadCurrencies();
        $originCurrency = self::$currencies[$originalCurrencyCode];
        if (is_null($targetCurrencyCode)) {
            $targetCurrencyCode = self::getCurrencyFromSession();
        }
        $targetCurrency = self::$currencies[$targetCurrencyCode];

        return $sum * $originCurrency->rate / $targetCurrency->rate;

    }

    public static function getCurrencySymbol()
    {
        self::loadCurrencies();
        return self::$currencies[self::getCurrencyFromSession()]->symbol;
    }

//    public static function getBaseCurrencyCode()
//    {
//$client = new Client();
//    }
}
