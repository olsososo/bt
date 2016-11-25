<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Models\Torrent;

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
        $step = 100;
        $start = 0;
        $end = Torrent::where('status', 1)->count();
        $times = ceil(($end - $start) / $step);
        
        for ($i = 0; $i < 1; $i++)
        {
            $data = Torrent::where('status', 1)->skip($i * $step)->take($step)->get();
            foreach ($data as $key => $value)
            {
                $this->info($value->name);
            }
        }
    }
}
