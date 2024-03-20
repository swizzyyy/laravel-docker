<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class wait_db extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wait_db';

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
        $i = 1;
        $ret = 1;
        while($i <= 10){
            echo 'connecting to host:'.config('database.connections.'.config('database.default').'.host').' try '.$i.'..';
            try {
                DB::connection()->getPdo();
                echo 'ok'.PHP_EOL;
                $ret = 0;
                break;
            } catch (\Exception $e) {
                echo 'error:' . $e->getMessage() .PHP_EOL;
                sleep(1);
                $i++;
            }
        }
        return $ret;
    }
}
