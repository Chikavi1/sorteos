<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tickets;
use Carbon\Carbon;

class freeStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:free-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $statusPending = Tickets::where('status',2)
        ->where('created_at', '<',
        Carbon::now()->subHours(16)->toDateTimeString())->update(['status' => 1]);

        dd($statusPending);


    }
}
