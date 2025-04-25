<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;
use App\Http\Resources\TripResource;
use App\Models\Trip;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TripController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return TripResource::collection(Trip::latest()->paginate(10));
    }

    public function store(TripRequest $request): TripResource|\Illuminate\Http\JsonResponse
    {
        try {
            $trip = Trip::create($request->validated());
            return new TripResource($trip);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Trip $trip): TripResource
    {
        return TripResource::make($trip);
    }

    public function update(TripRequest $request, Trip $trip): TripResource|\Illuminate\Http\JsonResponse
    {
        try {
            $trip->update($request->validated());
            return new TripResource($trip);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Trip $trip): \Illuminate\Http\JsonResponse
    {
        try {
            $trip->delete();
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
