<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parental;

class ParentalController extends Controller
{
    //
     // Display a list of all parents
     public function index()
     {
         $parents = Parental::latest()->paginate(10);
         return view('parents.index', compact('parents'));
     }
 
     // Show a specific parent by ID
     public function show(Parental $parent)
     {
        return view('parents.show' ,compact('parent'));
     }
     public function edit(Parental $parent)
     {
         return view('parents.edit', compact('parent'));
     }
     // Store a new parent record
     public function store(Request $request)
     {
         // Validate request data
         $validated = $request->validate([
             'ParentName' => 'required|string|max:255',
             'Longitude' => 'required|numeric',
             'Latitude' => 'required|numeric',
             'Address' => 'required|string',
             'PhoneNumber' => 'required|string|max:20',
             'Email' => 'required|email|unique:parentals,Email',
         ]);
 
         // Create and save the parent record
         Parental::create($validated)->all();
 
         return redirect()->route('parents.index')
         ->with('success', 'Parent created successfully.');
     }

     public function create()
    {
        return view('parents.create');
    }

 
     // Update a parent record
     public function update(Request $request, Parental $parent)
     {
         // Validate request data
         $validated = $request->validate([
             'ParentName' => 'required|string|max:255',
             'Longitude' => 'required|numeric',
             'Latitude' => 'required|numeric',
             'Address' => 'required|string',
             'PhoneNumber' => 'required|string|max:20',
             'Email' => 'required|email' // Ignore current record's email
         ]);
 
         // Find the parent and update
         $parent->update($validated);
 
         return redirect()->route('parents.index' )
            ->with("success","Parent updated successfully");
     }
 
     // Delete a parent record
     public function destroy(Parental $parent)
     {
         $parent->delete();
 
         return redirect()->route('parents.index')
            ->with('success',"Parent record deleted successfully");
     }
}
