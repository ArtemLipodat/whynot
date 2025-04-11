<?php
namespace App\Services;

use App\Http\Requests\CarRequest;
use App\Repositories\Contracts\CarRepositoryInterface;
use function Psy\debug;

class CarService
{
    public function __construct(private CarRepositoryInterface $repository)
    {
    }

    public function getAllCars()
    {
        return $this->repository->all();
    }

    public function getCar(int $id)
    {
        return $this->repository->find($id);
    }

    public function createCar(CarRequest $request)
    {
        $data = $request->validated();
        return $this->repository->create($data);
    }

    public function updateCar(CarRequest $request, int $id)
    {
        $data = $request->validated();
        return $this->repository->update($id, $data);
    }

    public function deleteCar(int $id)
    {
        return $this->repository->delete($id);
    }
}
