<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfigurationRequest;
use App\Services\ConfigurationService;
use Illuminate\Http\JsonResponse;

class ConfigurationController extends Controller
{

    public function __construct(private ConfigurationService $service)
    {
    }

    public function index(): JsonResponse
    {
        $configurations = $this->service->getAllConfiguration();
        return response()->json($configurations);
    }

    public function store(ConfigurationRequest $request): JsonResponse
    {
        $configuration = $this->service->createConfiguration($request);
        return response()->json($configuration, 201);
    }

    public function show(int $id): JsonResponse
    {
        $configuration = $this->service->getConfiguration($id);
        return response()->json($configuration);
    }

    public function update(ConfigurationRequest $request, int $id): JsonResponse
    {
        $configuration = $this->service->updateConfiguration($request, $id);
        return response()->json($configuration);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->deleteConfiguration($id);
        return response()->json(null, 204);
    }
}
