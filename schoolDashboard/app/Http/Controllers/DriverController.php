<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $drivers = Driver::latest()->paginate(10);
        return view('drivers.index', compact('drivers'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('drivers.create');
    }

    public function store(DriverRequest $request): \Illuminate\Http\RedirectResponse
    {
        Driver::create($request->validated());
        return redirect()->route('drivers.index')->with('success', 'Created successfully');
    }

    public function show(Driver $driver): \Illuminate\Contracts\View\View
    {
        return view('drivers.show', compact('driver'));
    }

    public function edit(Driver $driver): \Illuminate\Contracts\View\View
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(DriverRequest $request, Driver $driver): \Illuminate\Http\RedirectResponse
    {
        $driver->update($request->validated());
        return redirect()->route('drivers.index')->with('success', 'Updated successfully');
    }

    public function destroy(Driver $driver): \Illuminate\Http\RedirectResponse
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Deleted successfully');
    }
}
