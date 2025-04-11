<?php
namespace App\Services;

use App\Http\Requests\ConfigurationOptionRequest;
use App\Repositories\Contracts\ConfigurationOptionRepositoryInterface;

class ConfigurationOptionService
{
    public function __construct(private ConfigurationOptionRepositoryInterface $repository)
    {
    }

    public function getAllConfigurationOptions()
    {
        return $this->repository->all();
    }

    public function getConfigurationOption(int $id)
    {
        return $this->repository->find($id);
    }

    public function createConfigurationOption(ConfigurationOptionRequest $request)
    {
        $data = $request->validated();
        return $this->repository->create($data);
    }

    public function updateConfigurationOption(ConfigurationOptionRequest $request, int $id)
    {
        $data = $request->validated();
        return $this->repository->update($id, $data);
    }

    public function deleteConfigurationOption(int $id)
    {
        return $this->repository->delete($id);
    }
}
