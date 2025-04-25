<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;
use App\Models\Trip;

class TripController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $trips = Trip::latest()->paginate(10);
        return view('trips.index', compact('trips'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('trips.create');
    }

    public function store(TripRequest $request): \Illuminate\Http\RedirectResponse
    {
        Trip::create($request->validated());
        return redirect()->route('trips.index')->with('success', 'Created successfully');
    }

    public function show(Trip $trip): \Illuminate\Contracts\View\View
    {
        return view('trips.show', compact('trip'));
    }

    public function edit(Trip $trip): \Illuminate\Contracts\View\View
    {
        return view('trips.edit', compact('trip'));
    }

    public function update(TripRequest $request, Trip $trip): \Illuminate\Http\RedirectResponse
    {
        $trip->update($request->validated());
        return redirect()->route('trips.index')->with('success', 'Updated successfully');
    }

    public function destroy(Trip $trip): \Illuminate\Http\RedirectResponse
    {
        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Deleted successfully');
    }
}
