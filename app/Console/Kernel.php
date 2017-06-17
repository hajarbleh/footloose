<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use App\TransactionDetail;
use App\Transaction;
use App\BestSeller;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            DB::table('best_sellers')->delete();
            $monthNow = Carbon::now()->month;
            $transactions = Transaction::whereMonth('timestamp', '=', $monthNow)->get();
            $bestSellerCandidate = TransactionDetail::whereIn('transaction_id', $transactions)->groupBy('base_id','strap_id')
                ->selectRaw('sum(quantity) as quantity, base_id, strap_id')
                ->get();
            foreach($bestSellerCandidate as $bsc) {
                $bestSeller = new BestSeller();
                $bestSeller->base_id = $bsc->base_id;
                $bestSeller->strap_id = $bsc->strap_id;
                $bestSeller->quantity = $bsc->quantity;
                $bestSeller->save();
            }
        })->monthly();
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
