<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;

class OperatorController extends Controller
{
    //
    public function index()
    {
        $operators = Operator::latest()->paginate(10);
        return view('operators.index', compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'VanOperatorName' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:20',
            'Email' => 'required|email|unique:parentals,Email',
        ]);

        Operator::create($request->all());

        return redirect()->route('operators.index')
            ->with('success', 'Operator created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        return view('operators.show', compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {
        return view('operators.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $operator)
    {
        $request->validate([
            'VanOperatorName' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:20',
            'Email' => 'required|email|unique:parentals,Email',
            
        ]);

        $operator->update($request->all());

        return redirect()->route('operators.index')
            ->with('success', 'Operator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        $operator->delete();

        return redirect()->route('operators.index')
            ->with('success', 'Operator deleted successfully');
    }
}
