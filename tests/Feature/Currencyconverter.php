<?php

namespace Tests\Feature;

use App\Rate;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Currencyconverter extends TestCase
{
    /**
     * [assertConversionWorks description]
     * @return [integer] Mocked value since We are using an external Service
     */
    public function testAssertConversionWorks()
    {
        $currency = 'USD';
        $client_mock = \Mockery::mock('overload:App\Models\Rate');

        $client_mock->shouldReceive('getRates')->with($currency)->andReturn(1);
    }
}
