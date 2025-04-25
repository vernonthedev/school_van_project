<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    //
    public function index()
    {
        // Read - Display a list of items
        $trips = Trip::latest()->paginate(10);
        return view('trips.index', compact('trips'));
    }
    public function create()
    {
        // Create - Show the form to create a new item
    }
    public function store(Request $request)
    {
        // Create - Save a new item to the database
    }
    public function show($id)
    {
        // Read - Display a single item
    }
    public function edit($id)
    {
        // Update - Show the form to edit an item
    }
    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
    }
    public function destroy($id)
    {
        // Delete - Remove an item from the database
    }

}
