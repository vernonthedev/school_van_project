<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VanRequest;
use App\Http\Resources\VanResource;
use App\Models\Van;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VanController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return VanResource::collection(Van::latest()->paginate(10));
    }

    public function store(VanRequest $request): VanResource|\Illuminate\Http\JsonResponse
    {
        try {
            $van = Van::create($request->validated());
            return new VanResource($van);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Van $van): VanResource
    {
        return VanResource::make($van);
    }

    public function update(VanRequest $request, Van $van): VanResource|\Illuminate\Http\JsonResponse
    {
        try {
            $van->update($request->validated());
            return new VanResource($van);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Van $van): \Illuminate\Http\JsonResponse
    {
        try {
            $van->delete();
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
