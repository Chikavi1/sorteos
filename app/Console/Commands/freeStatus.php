<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tickets;
use Carbon\Carbon;

class freeStatus extends Command
{

    protected $signature = 'app:free-status';

    protected $description = 'Command description';
    public function handle()
    {

        $statusPending = Tickets::where('status',2)->where('created_at', '<',
        Carbon::now()->subHours(20)->toDateTimeString())->update(['status' => 1]);

        dd($statusPending);


    }
}
