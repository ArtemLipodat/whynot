<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Services\PriceService;
use Illuminate\Http\JsonResponse;

class PriceController extends Controller
{

    public function __construct(private PriceService $service)
    {
    }

    public function index(): JsonResponse
    {
        $prices = $this->service->getAllPrices();
        return response()->json($prices);
    }

    public function store(PriceRequest $request): JsonResponse
    {
        $price = $this->service->createPrice($request);
        return response()->json($price, 201);
    }

    public function show(int $id): JsonResponse
    {
        $price = $this->service->getPrice($id);
        return response()->json($price);
    }

    public function update(PriceRequest $request, int $id): JsonResponse
    {
        $price = $this->service->updatePrice($request, $id);
        return response()->json($price);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->deletePrice($id);
        return response()->json(null, 204);
    }
}
