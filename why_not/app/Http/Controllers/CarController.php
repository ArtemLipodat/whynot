<?php
namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Services\CarService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;

class CarController extends Controller
{
    public function __construct(private CarService $service)
    {
    }

    public function available(Request $request)
    {
        $available = Cache::remember('available', now()->addMinutes(10), function () {
            return Car::with([
                'configurations' => function ($query) {
                    $query->whereHas('price', function ($priceQuery) {
                        $priceQuery->where('start_date', '<=', Carbon::today())
                            ->where('end_date', '>=', Carbon::today());
                    });
                },
                'configurations.options',
                'configurations.price'
            ])->get();
        });
        return CarResource::collection($available)->collection->all();
    }

    public function index(): JsonResponse
    {
        $cars = $this->service->getAllCars();
        return response()->json($cars);
    }

    public function store(CarRequest $request): JsonResponse
    {
        $car = $this->service->createCar($request);
        return response()->json($car, 201);
    }

    public function show(int $id): JsonResponse
    {
        $car = $this->service->getCar($id);
        return response()->json($car);
    }

    public function update(CarRequest $request, int $id): JsonResponse
    {
        $car = $this->service->updateCar($request, $id);
        return response()->json($car);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->deleteCar($id);
        return response()->json(null, 204);
    }
}
