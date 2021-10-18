<?php

namespace App\Console\Commands\GoogleBooks;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class LoadBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'googlebooks:load-book {title}';

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
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response = Http::get('https://postman-echo.com/get', [
            'foo' => 'bar',
            'alpha' => 'omega'
        ]);

        dump($response->json());

        return 0;
    }
}
