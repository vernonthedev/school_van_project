<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\api\BaseApiController;
use Illuminate\Http\Request;
use App\Models\Parental;
use App\Models\Child;
use Illuminate\Support\Str;

/**
 * @group Parent Management
 *
 * APIs for managing all parents.
 */
class ParentalController extends Controller
{
 
    public function show(Request $request, Parental $parents){
        return response()->json([
            'success' => true,
            'data' => $parents
        ]);
    }

    public function index(){
        
            $parents = Parental::all();
            return response()->json($parents);
        
    }

    public function parentLogin(Request $request)
    {
        $request->validate([
            'Email' => 'required|email',
            'ParentName' => 'required|string',
        ]);

        $parent = Parental::where('Email', $request->Email)
            ->where('ParentName', $request->ParentName)
            ->first();

        if (!$parent) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Generate API key if doesn't exist
        if (empty($parent->api_key)) {
            $parent->api_key = Str::random(64);
            $parent->save();
        }

        return response()->json([
            'message' => 'Login successful',
            'api_key' => $parent->api_key,
            'parent' => $parent,
        ]);
    }

    public function parentLogout(Request $request)
    {
        $apiKey = $request->header('X-API-KEY') ?? $request->input('api_key');
        $parent = Parental::where('api_key', $apiKey)->first();
        
        if ($parent) {
            $parent->api_key = null;
            $parent->save();
        }

        return response()->json(['message' => 'Logged out successfully']);
    }

    
}
