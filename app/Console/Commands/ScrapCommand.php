<?php

namespace App\Console\Commands;

use App\Services\Scrappers;
use Illuminate\Console\Command;

class ScrapCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrap:data {type} {--L|level=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapt website data for a particular model.';

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
     * @return mixed
     */
    public function handle()
    {
        switch ($this->argument('type')){
            case 'fih':
                $scrapper = new Scrappers\FederationScrapper();
                $scrapper->get($this->option('level'));
                print $scrapper->message();
                break;
        }
    }
}
