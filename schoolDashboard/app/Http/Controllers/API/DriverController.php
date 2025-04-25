<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DriverController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return DriverResource::collection(Driver::latest()->paginate(10));
    }

    public function store(DriverRequest $request): DriverResource|\Illuminate\Http\JsonResponse
    {
        try {
            $driver = Driver::create($request->validated());
            return new DriverResource($driver);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Driver $driver): DriverResource
    {
        return DriverResource::make($driver);
    }

    public function update(DriverRequest $request, Driver $driver): DriverResource|\Illuminate\Http\JsonResponse
    {
        try {
            $driver->update($request->validated());
            return new DriverResource($driver);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Driver $driver): \Illuminate\Http\JsonResponse
    {
        try {
            $driver->delete();
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
