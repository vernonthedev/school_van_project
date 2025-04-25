<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperatorRequest;
use App\Http\Resources\OperatorResource;
use App\Models\Operator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperatorController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return OperatorResource::collection(Operator::latest()->paginate(10));
    }

    public function store(OperatorRequest $request): OperatorResource|\Illuminate\Http\JsonResponse
    {
        try {
            $operator = Operator::create($request->validated());
            return new OperatorResource($operator);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Operator $operator): OperatorResource
    {
        return OperatorResource::make($operator);
    }

    public function update(OperatorRequest $request, Operator $operator): OperatorResource|\Illuminate\Http\JsonResponse
    {
        try {
            $operator->update($request->validated());
            return new OperatorResource($operator);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Operator $operator): \Illuminate\Http\JsonResponse
    {
        try {
            $operator->delete();
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
