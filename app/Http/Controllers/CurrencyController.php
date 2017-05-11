<?php

namespace App\Http\Controllers;

use App\Currencies;
use App\Rate;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Get current rates
     * @param  Request $request Amount selected from dropdown
     * @return [integer]       A view with current rate
     */
    public function getRate()
    {
        $available_currencies = Currencies::All();

        return view('welcome')->with([
            'available_currencies' => $available_currencies,
        ]);
    }

    public function storeRate(Request $request)
    {
        $current_rate = Rate::getRates($request->currency_id);

        $this->saveRate($request->currency_id, (int)$current_rate);

        return back()->withSuccess("The value of $request->currency_id in comparisson with the USD is $current_rate");
    }


    /**
     * Will save the rate to the database
     */
    protected function saveRate($currency_type, $current_rate)
    {
        Rate::create([
            'currency' => $currency_type,
            'value' => $current_rate
        ]);
    }
}
