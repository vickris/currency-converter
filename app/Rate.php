<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    // Mass assignable attributes when using create method
    protected $fillable = ['currency', 'value'];

    /**
     * [Use google API to get current conversion Rates]
     * @param  [string]  $from_Currency [Currency to compare]
     * @param  string  $to_Currency   [Currency to be compared with]
     * @param  integer $amount        [Amount to compare]
     * @return [integer]                 [Current conversion Rate]
     */
    public static function getRates($from_Currency,$to_Currency = 'USD',$amount = 1)
    {
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $encode_amount = 1;
        $get = file_get_contents("https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");

        $get = explode("<span class=bld>",$get);
        $get = explode("</span>",$get[1]);
        $converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);

        return $converted_currency;
    }
}
