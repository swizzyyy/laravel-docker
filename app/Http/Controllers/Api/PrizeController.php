<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePrizeValidation;
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

    public function create(CreatePrizeValidation $request): JsonResponse
    {
        $prize = $this->prizeService->create($request);

        return response()->json(['message' => 'Prize created successfully', 'data' => $prize], 201);
    }
}
