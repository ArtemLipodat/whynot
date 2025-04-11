<?php
namespace App\Services;

use App\Http\Requests\PriceRequest;
use App\Repositories\Contracts\PriceRepositoryInterface;

class PriceService
{
    public function __construct(private PriceRepositoryInterface $repository)
    {
    }

    public function getAllPrices()
    {
        return $this->repository->all();
    }

    public function getPrice(int $id)
    {
        return $this->repository->find($id);
    }

    public function createPrice(PriceRequest $request)
    {
        $data = $request->validated();
        return $this->repository->create($data);
    }

    public function updatePrice(PriceRequest $request, int $id)
    {
        $data = $request->validated();
        return $this->repository->update($id, $data);
    }

    public function deletePrice(int $id)
    {
        return $this->repository->delete($id);
    }
}
