<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequest;
use App\Services\OptionService;
use Illuminate\Http\JsonResponse;

class OptionController extends Controller
{

    public function __construct(private OptionService $service)
    {
    }


    public function index(): JsonResponse
    {
        $options = $this->service->getOptions();
        return response()->json($options);
    }


    public function store(OptionRequest $request): JsonResponse
    {
        $option = $this->service->createOption($request);
        return response()->json($option, 201);
    }


    public function show(int $id): JsonResponse
    {
        $option = $this->service->getOption($id);
        return response()->json($option);
    }


    public function update(OptionRequest $request, int $id): JsonResponse
    {
        $option = $this->service->updateOption($request, $id);
        return response()->json($option);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->deleteOption($id);
        return response()->json(null, 204);
    }
}
