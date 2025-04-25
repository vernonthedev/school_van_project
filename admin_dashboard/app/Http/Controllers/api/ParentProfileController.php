<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Controller\api\BaseApiController;
use App\Models\Parental;
use App\Models\Child;
use Illuminate\Http\Request;


/**
 * @group Profile Management
 *
 * APIs for managing parent profile information.
 */
class ParentProfileController extends Controller
{
    //
    public function getProfile(Request $request)
    {
        $apiKey = $request->header('X-API-KEY');
    
        if (!$apiKey) {
            return response()->json(['error' => 'API key required'], 401);
        }
    
        $parent = Parental::where('api_key', $apiKey)->first();
        
        if (!$parent) {
            return response()->json(['error' => 'Invalid API key'], 401);
        }
    
        $children = $parent->children()->get(['ChildName','ChildID']);
    

        return response()->json([
            'parent_name' => $parent->ParentName,
            'email' => $parent->Email,
            'phone_number' => $parent->PhoneNumber,
            'children' => $children
        ]);
    }

    public function getChildrenByParent(Request $request)
    {
        try {
            $parentId = $request->validate([
                'ParentID' => 'required|integer'
            ]);

            $children = Child::where('ParentId', $parentId)
                ->get(['ChildID', 'ChildName', 'ParentId']);

            return response()->json([
                'status' => 'success',
                'children' => $children
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    

    }
}
