<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parental;

/**
 * @group Starter Management
 *
 * APIs for managing the api starter information.
 */
class BaseApiController extends Controller
{
    //

    protected $parent;
    
    public function __construct()
    {
        $this->authenticate();
    }
    
    protected function authenticate()
    {
        $apiKey = request()->header('X-API-KEY') ?? request()->input('api_key');
        
        if (!$apiKey) {
            abort(response()->json(['error' => 'API key required'], 401));
        }

        $this->parent = Parental::where('api_key', $apiKey)->first();

        if (!$this->parent) {
            abort(response()->json(['error' => 'Invalid API key'], 401));
        }
    }
}
