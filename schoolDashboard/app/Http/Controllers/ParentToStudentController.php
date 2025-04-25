<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentToStudentRequest;
use App\Models\ParentToStudent;

class ParentToStudentController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $parent_to_students = ParentToStudent::latest()->paginate(10);
        return view('parent_to_students.index', compact('parent_to_students'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('parent_to_students.create');
    }

    public function store(ParentToStudentRequest $request): \Illuminate\Http\RedirectResponse
    {
        ParentToStudent::create($request->validated());
        return redirect()->route('parent_to_students.index')->with('success', 'Created successfully');
    }

    public function show(ParentToStudent $parentToStudent): \Illuminate\Contracts\View\View
    {
        return view('parent_to_students.show', compact('parentToStudent'));
    }

    public function edit(ParentToStudent $parentToStudent): \Illuminate\Contracts\View\View
    {
        return view('parent_to_students.edit', compact('parentToStudent'));
    }

    public function update(ParentToStudentRequest $request, ParentToStudent $parentToStudent): \Illuminate\Http\RedirectResponse
    {
        $parentToStudent->update($request->validated());
        return redirect()->route('parent_to_students.index')->with('success', 'Updated successfully');
    }

    public function destroy(ParentToStudent $parentToStudent): \Illuminate\Http\RedirectResponse
    {
        $parentToStudent->delete();
        return redirect()->route('parent_to_students.index')->with('success', 'Deleted successfully');
    }
}
