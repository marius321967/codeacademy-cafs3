<?php

namespace Tests\Unit;

use App\Services\ExchangeRates\ExampleApiExchangeRateService;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Request;
use Tests\TestCase;

class ExampleApiExchangeRateServiceTest extends TestCase
{

    protected function setUp(): void {
        parent::setUp();
        
        Http::fake([
            'api.exchangerate.host/*' => Http::response([
                'rates' => [
                    'FOO' => 3.14
                ]
            ])
        ]);
    }

    public function testGetExchangeRatesSendsRequest(): void
    {
        $service = new ExampleApiExchangeRateService('test_key-123');

        $service->getExchangeRates();
        
        Http::assertSent(function (Request $request) {
            return $request->url() === 'https://api.exchangerate.host/latest';
        });
        
        Http::assertSentCount(1);
    }

    public function testGetExchangeRatesConvertsResponse(): void
    {
        $service = new ExampleApiExchangeRateService('test_key-123');

        $result = $service->getExchangeRates();
        
        $this->assertCount(1, $result);
        $this->assertEquals('FOO', $result[0]->symbol);
        $this->assertEquals(3.14, $result[0]->rate);
    }
}
