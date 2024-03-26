<?php
namespace App\Actions;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class getDataFromRedisAction
{
    public function __invoke($table,$key)
    {
        $data = Redis::get($key);

        if ($data === null) {
            $data = DB::table($table)->get()->toArray();

            Redis::set($key, json_encode($data));
        } else {
            $data = json_decode($data);
        }
            return $data;
    }
}
