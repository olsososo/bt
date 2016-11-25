<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Models\Torrent;
use Illuminate\Support\Facades\Redis;

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
        $step = 1000;
        
        $start = Redis::get('sitemap');
        $end = Torrent::where('status', 1)->count();
        Redis::set('sitemap', $start);
        
        $times = ceil(($end - $start) / $step);
        $bar = $this->output->createProgressBar($times);
        
        for ($i = 0; $i < $times; $i++)
        {
            $data = Torrent::where('status', 1)->skip($i * $step)->take($step)->get();
            foreach ($data as $key => $value)
            {
                $path = base_path('public/sitemaps/'.  ceil($value->id / 10000) .'.xml');
                if (file_exists($path)) {
                    $xml = new \SimpleXMLElement(file_get_contents($path));
                } else {
                    $xml = new \SimpleXMLElement('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
                }
                
                $url = $xml->addChild('url');
                $url->addChild('loc', 'http://www.ibittorrent.com/torrent/'.  base64_encode($value->id));
                $url->addChild('lastmod', date('Y-m-d', $value->updated_at));
             
                $handle = fopen($path, 'wb');
                fwrite($handle, $xml->asXML());
                fclose($handle);
            }
            
            $bar->advance();
        }
        
        $bar->finish();
    }
}