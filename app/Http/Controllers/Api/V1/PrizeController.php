<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePrizeValidation;
use App\Http\Resources\PrizeResource;
use App\Services\PrizeService;
use Illuminate\Http\JsonResponse;

class PrizeController extends Controller
{
    protected $prizeService;

    //NotFoundExeption is declared in  Handler Class render method
     public function __construct(PrizeService $prizeService)
    {
            $this->prizeService = $prizeService;
    }

    public function create(CreatePrizeValidation $request): PrizeResource
    {
        $prize = $this->prizeService->create($request);

        return PrizeResource::make($prize);
    }
}
