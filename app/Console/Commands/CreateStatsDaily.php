<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Stats;
use App\Models\Url;

class CreateStatsDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-stats-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make stats record daily';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $urls = Url::all('id');
        $date = now()->format('Y-m-d');

        foreach ($urls as $url) {
            $stats = Stats::where('url_id', $url->id)
                         ->where('date', $date)
                         ->first();

            if (! $stats) {
                Stats::create([
                    'url_id' => $url->id,
                    'date' => $date,
                    'clicks' => 0
                ]);
            }
        }

        $this->info('Record inserted successfully.');
    }
}
