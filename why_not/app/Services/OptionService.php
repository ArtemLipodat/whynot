<?php
namespace App\Services;

use App\Http\Requests\OptionRequest;
use App\Repositories\Contracts\OptionRepositoryInterface;

class OptionService
{
    public function __construct(private OptionRepositoryInterface $repository)
    {
    }

    public function getOptions()
    {
        return $this->repository->all();
    }

    public function getOption(int $id)
    {
        return $this->repository->find($id);
    }

    public function createOption(OptionRequest $request)
    {
        $data = $request->validated();
        return $this->repository->create($data);
    }

    public function updateOption(OptionRequest $request, int $id)
    {
        $data = $request->validated();
        return $this->repository->update($id, $data);
    }

    public function deleteOption(int $id)
    {
        return $this->repository->delete($id);
    }
}
