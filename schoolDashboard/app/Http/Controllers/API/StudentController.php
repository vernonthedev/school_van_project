<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return StudentResource::collection(Student::latest()->paginate(10));
    }

    public function store(StudentRequest $request): StudentResource|\Illuminate\Http\JsonResponse
    {
        try {
            $student = Student::create($request->validated());
            return new StudentResource($student);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(Student $student): StudentResource
    {
        return StudentResource::make($student);
    }

    public function update(StudentRequest $request, Student $student): StudentResource|\Illuminate\Http\JsonResponse
    {
        try {
            $student->update($request->validated());
            return new StudentResource($student);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Student $student): \Illuminate\Http\JsonResponse
    {
        try {
            $student->delete();
            return response()->json(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'There is an error.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
