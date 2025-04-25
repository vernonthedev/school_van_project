<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Van;
use App\Models\Driver;
use App\Models\Operator;


class VanController extends Controller
{
    // List vans with related driver and operator info
    public function index()
    {
        $vans = Van::with(['driver', 'operator'])->latest()->paginate(10);
        return view('vans.index', compact('vans'));
    }

    // Show the form for creating a new van
    public function create()
    {
        $drivers = Driver::all();
        $operators = Operator::all();
        return view('vans.create', compact('drivers', 'operators'));
    }

    // Store a newly created van in the database
    // VanController.php

    public function store(Request $request)
    {
        $validated = $request->validate([
            'NumberPlate' => 'required|string|max:255',
            'VanCapacity' => 'required|integer',
            'VanOperatorID' => 'required|exists:operators,VanOperatorID',
            'DriverID' => 'required|exists:drivers,DriverID',
        ]);

        // Check if driver is already assigned
        if (Van::where('DriverID', $validated['DriverID'])->exists()) {
            return back()->withErrors(['DriverID' => 'This driver is already assigned to a van'])->withInput();
        }

        // Check if operator is already assigned
        if (Van::where('VanOperatorID', $validated['VanOperatorID'])->exists()) {
            return back()->withErrors(['VanOperatorID' => 'This operator is already assigned to a van'])->withInput();
        }

        Van::create($validated);

        return redirect()->route('vans.index')->with('success', 'Van created successfully');
    }

    // Show a specific van
    public function show(Van $van)
    {
        $van->load(['driver', 'operator']);
        return view('vans.show', compact('van'));
    }

    // Show the form for editing a specific van
    public function edit(Van $van)
    {
        $drivers = Driver::all();
        $operators = Operator::all();
        return view('vans.edit', compact('van', 'drivers', 'operators'));
    }

    // Update a specific van
    public function update(Request $request, Van $van)
    {
        $validated = $request->validate([
            'NumberPlate' => 'required|string|max:255',
            'VanCapacity' => 'required|integer',
            'VanOperatorID' => 'required|exists:operators,VanOperatorID',
            'DriverID' => 'required|exists:drivers,DriverID',
        ]);

        $van->update($validated);

        return redirect()->route('vans.index')->with('success', 'Van updated successfully');
    }

    // Delete a van
    public function destroy(Van $van)
    {
        $van->delete();
        return redirect()->route('vans.index')->with('success', 'Van deleted successfully');
    }
}
