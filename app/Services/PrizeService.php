<?php
namespace App\Services;

use App\Models\Prize;
use Illuminate\Support\Facades\Log;

class PrizeService
{

    /**
     * Prize Creation
    */

    public function create($request)
    {
        $prize = new Prize();

        $prize->name = $request['name'];
        $prize->type = $request['type'];

        if($prize->save())
        {
            return $prize;
        }
    }

    /**
     * Prize Update
    */

    public function update($product,$request)
    {

    }
}
