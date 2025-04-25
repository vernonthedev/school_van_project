<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pickup;
use App\Models\Parental;
use App\Models\Operator;
use App\Models\Child;
use Illuminate\Support\Facades\Log;

/**
 * @group Pickup Management
 *
 * APIs for managing pickup information
 */
class PickupController extends Controller
{
    //
    public function verifyPickup(Request $request)
    {
        try {
            $validated = $request->validate([
                'ParentID' => 'required|exists:parentals,ParentID',
                'ChildID' => 'required|exists:children,ChildID',
                'VanOperatorID' => 'required|exists:operators,VanOperatorID',
                'verification_time' => 'required|date',
            ]);
    
            // Check if parent is authorized for this child
            $parent = Parental::find($validated['ParentID']);
            if (!$parent->children()->where('ChildID', $validated['ChildID'])->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Parent not authorized for this child',
                ], 403);
            }
    
            $pickup = Pickup::create($validated);
    
            return response()->json([
                'success' => true,
                'message' => 'Verification successful',
                'data' => [
                    'pickup' => $pickup,
                    'parent_name' => $parent->ParentName,
                    'child_name' => $pickup->child->ChildName,
                ]
            ]);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Pickup Verification Error: '.$e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Server error: '.$e->getMessage(),
            ], 500);
        }
    }
}
