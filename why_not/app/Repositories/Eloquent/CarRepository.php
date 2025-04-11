<?php
namespace App\Repositories\Eloquent;

use App\Models\Car;
use App\Repositories\Contracts\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    public function __construct(private Car $model)
    {
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $car = $this->find($id);
        $car->update($data);
        return $car;
    }

    public function delete(int $id)
    {
        $car = $this->find($id);
        return $car->delete();
    }
}
