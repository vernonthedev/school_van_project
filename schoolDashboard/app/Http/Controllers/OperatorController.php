<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperatorRequest;
use App\Models\Operator;

class OperatorController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $operators = Operator::latest()->paginate(10);
        return view('operators.index', compact('operators'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('operators.create');
    }

    public function store(OperatorRequest $request): \Illuminate\Http\RedirectResponse
    {
        Operator::create($request->validated());
        return redirect()->route('operators.index')->with('success', 'Created successfully');
    }

    public function show(Operator $operator): \Illuminate\Contracts\View\View
    {
        return view('operators.show', compact('operator'));
    }

    public function edit(Operator $operator): \Illuminate\Contracts\View\View
    {
        return view('operators.edit', compact('operator'));
    }

    public function update(OperatorRequest $request, Operator $operator): \Illuminate\Http\RedirectResponse
    {
        $operator->update($request->validated());
        return redirect()->route('operators.index')->with('success', 'Updated successfully');
    }

    public function destroy(Operator $operator): \Illuminate\Http\RedirectResponse
    {
        $operator->delete();
        return redirect()->route('operators.index')->with('success', 'Deleted successfully');
    }
}
