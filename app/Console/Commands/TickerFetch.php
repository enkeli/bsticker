<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp;
use App\Entities;

class TickerFetch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticker:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new GuzzleHttp\Client(['base_uri' => 'https://api.bitso.com/']);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Send a request to https://foo.com/api/test
        $response = $this->client->get('/v3/ticker/');

        if ($response->getStatusCode() == 200) {
            $body = json_decode($response->getBody());
            if ($body->success == 1) {
                foreach ($body->payload as $payload) {
                    $tick = new Entities\Tick;
                    $tick->book = $payload->book;
                    $tick->high = $payload->high;
                    $tick->last = $payload->last;
                    $tick->low = $payload->low;
                    $tick->ask = $payload->ask;
                    $tick->bid = $payload->bid;
                    $tick->payload = $payload;
                    $tick->volume = $payload->volume;
                    $tick->vwap = $payload->vwap;
                    $tick->created_at = $payload->created_at;
                    $tick->save();
                }
            }
        }

    }
}
