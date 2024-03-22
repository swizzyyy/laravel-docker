<?php
namespace App\Actions;

use App\Models\Player;
use App\Models\Setting;

class CalculateSpinAction
{
    public function __invoke($lastSpinTime)
    {
        if(is_null($lastSpinTime)){
            return true;
        }

        $spinCoolDown = Setting::first()->cooldown_hour;

        $allowedSpinTime = $lastSpinTime->addHours($spinCoolDown);

        return now() >= $allowedSpinTime ? true : false;
    }
}
