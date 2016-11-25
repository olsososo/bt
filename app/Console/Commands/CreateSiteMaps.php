<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateSiteMaps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemaps:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create sitemaps for search engine';

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
        $name = $this->ask('你是名字是?');
    }
}
