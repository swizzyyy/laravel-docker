<?php
namespace App\Services;

use App\Models\Prize;

class PrizeService
{

    /**
     * Prize Creation
    */

    public function create($request)
    {
        return Prize::create($request);
    }

    /**
     * Prize Update
    */

    public function update($request)
    {

    }
}
