<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigurationOptionRequest;
use App\Services\ConfigurationOptionService;
use Illuminate\Http\JsonResponse;

class ConfigurationOptionController extends Controller
{

    public function __construct(private ConfigurationOptionService $service)
    {
    }

    public function index(): JsonResponse
    {
        $configurationOptions = $this->service->getAllConfigurationOptions();
        return response()->json($configurationOptions);
    }

    public function store(ConfigurationOptionRequest $request): JsonResponse
    {
        $configurationOption = $this->service->createConfigurationOption($request);
        return response()->json($configurationOption, 201);
    }

    public function show(int $id): JsonResponse
    {
        $configurationOption = $this->service->getConfigurationOption($id);
        return response()->json($configurationOption);
    }

    public function update(ConfigurationOptionRequest $request, int $id): JsonResponse
    {
        $configurationOption = $this->service->updateConfigurationOption($request, $id);
        return response()->json($configurationOption);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->deleteConfigurationOption($id);
        return response()->json(null, 204);
    }
}
