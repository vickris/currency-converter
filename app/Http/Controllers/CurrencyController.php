<?php

namespace App\Http\Controllers;

use App\Currencies;
use App\Rate;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Return the view make request to getRates
     */
    public function getRate()
    {
        $available_currencies = Currencies::All();

        return view('welcome')->with([
            'available_currencies' => $available_currencies,
        ]);
    }

    /**
     * Store the current rates in a database
     */
    public function storeRate(Request $request)
    {
        $current_rate = Rate::getRates($request->currency_name);

        $this->saveRate($request->currency_name, (int)$current_rate);

        return back()->withSuccess("The value of $request->currency_name in comparisson with the USD is $current_rate");
    }


    /**
     * Small helper to save data.
     */
    protected function saveRate($currency_type, $current_rate)
    {
        Rate::create([
            'currency' => $currency_type,
            'value' => $current_rate
        ]);
    }
}
