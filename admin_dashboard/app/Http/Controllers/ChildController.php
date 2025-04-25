<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Parental;

class ChildController extends Controller
{
    //
    public function index()
    {
        $children = Child::with('parent')->latest()->paginate(10); 
        return view('children.index', compact('children'));
    }

    // Show a specific child by ID
    public function show(Child $children)
     {
        return view('children.show' ,compact('children'));
     }
    public function create()
    {
        $parents = Parental::all();
        return view('children.create',compact('parents'));
    }

    // Store a new child record
    public function store(Request $request)
    {
         // Validate request data
    $validated = $request->validate([
        'ChildName' => 'required|string|max:255',
        'ParentId' => 'required|exists:parentals,ParentID', // Ensure parent exists
    ]);

    // Create and save the child record
    Child::create($validated);

    return redirect()->route('children.index')
        ->with("success", "Child added successfully");
    }


    public function edit(Child $children)
    { 
        // $children = Child::findOrFail();
        $parents = Parental::all(); // Fetch all parents for the dropdown
        return view('children.edit', compact('children', 'parents'));
    }

    // Update a child record
    public function update(Request $request, $id)
    {
        // Validate request data
        $validated = $request->validate([
            'ChildName' => 'required|string|max:255',
            'ParentId' => 'required|exists:parentals,ParentID',
        ]);

        // Find the child and update
        $child = Child::findOrFail($id);
        $child->update($validated);

        return redirect()->route('children.index' )
            ->with("success","Child updated successfully");
    }

    // Delete a child record
    public function destroy(Child $children)
    {
        $children->delete();

        return redirect()->route('children.index')
            ->with('success', 'Child record deleted successfully');
    }
}
