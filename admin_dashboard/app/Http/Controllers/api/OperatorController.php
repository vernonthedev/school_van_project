<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operator;


/**
 * @group Operator Auth management
 *
 * APIs for managing van operator authentication
 */
class OperatorController extends Controller
{
    //
    public function operatorLogin(Request $request) {
        $validated = $request->validate([
            'VanOperatorName' => 'required|string|max:255',
            'PhoneNumber' => 'required|string|max:20',// Make sure this matches your frontend field name
        ]);
    
        $operator = Operator::where('VanOperatorName', $validated['VanOperatorName'])
            ->where('PhoneNumber', $validated['PhoneNumber']) // Using the validated data
            ->first();
    
        if (!$operator) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    
        return response()->json([
            'message' => 'Login successful',
            'operator' => $operator,
        ]);
    }
}
