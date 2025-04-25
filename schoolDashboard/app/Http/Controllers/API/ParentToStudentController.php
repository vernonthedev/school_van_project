<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentToStudentRequest;
use App\Http\Resources\ParentToStudentResource;
use App\Models\ParentToStudent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParentToStudentController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ParentToStudentResource::collection(ParentToStudent::latest()->paginate(10));
    }

    public function store(ParentToStudentRequest $request): ParentToStudentResource|\Illuminate\Http\JsonResponse
    {
        try {
            $parentToStudent = ParentToStudent::create($request->validated());
            return new ParentToStudentResource($parentToStudent);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(ParentToStudent $parentToStudent): ParentToStudentResource
    {
        return ParentToStudentResource::make($parentToStudent);
    }

    public function update(ParentToStudentRequest $request, ParentToStudent $parentToStudent): ParentToStudentResource|\Illuminate\Http\JsonResponse
    {
        try {
            $parentToStudent->update($request->validated());
            return new ParentToStudentResource($parentToStudent);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(ParentToStudent $parentToStudent): \Illuminate\Http\JsonResponse
    {
        try {
            $parentToStudent->delete();
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
