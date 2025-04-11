<?php
namespace App\Services;

use App\Http\Requests\ConfigurationRequest;
use App\Repositories\Contracts\ConfigurationRepositoryInterface;

class ConfigurationService
{
    public function __construct(private ConfigurationRepositoryInterface $repository)
    {
    }

    public function getAllConfiguration()
    {
        return $this->repository->all();
    }

    public function getConfiguration(int $id)
    {
        return $this->repository->find($id);
    }

    public function createConfiguration(ConfigurationRequest $request)
    {
        $data = $request->validated();
        return $this->repository->create($data);
    }

    public function updateConfiguration(ConfigurationRequest $request, int $id)
    {
        $data = $request->validated();
        return $this->repository->update($id, $data);
    }

    public function deleteConfiguration(int $id)
    {
        return $this->repository->delete($id);
    }
}
