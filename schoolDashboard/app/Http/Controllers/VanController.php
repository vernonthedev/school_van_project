<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VanRequest;
use App\Models\Van;

class VanController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $vans = Van::latest()->paginate(10);
        return view('vans.index', compact('vans'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('vans.create');
    }

    public function store(VanRequest $request): \Illuminate\Http\RedirectResponse
    {
        Van::create($request->validated());
        return redirect()->route('vans.index')->with('success', 'Created successfully');
    }

    public function show(Van $van): \Illuminate\Contracts\View\View
    {
        return view('vans.show', compact('van'));
    }

    public function edit(Van $van): \Illuminate\Contracts\View\View
    {
        return view('vans.edit', compact('van'));
    }

    public function update(VanRequest $request, Van $van): \Illuminate\Http\RedirectResponse
    {
        $van->update($request->validated());
        return redirect()->route('vans.index')->with('success', 'Updated successfully');
    }

    public function destroy(Van $van): \Illuminate\Http\RedirectResponse
    {
        $van->delete();
        return redirect()->route('vans.index')->with('success', 'Deleted successfully');
    }
}
