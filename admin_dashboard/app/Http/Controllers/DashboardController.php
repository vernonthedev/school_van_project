<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Child;
use App\Models\Van;
// use App\Models\Attendance;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
{
    $totalChildren = Child::count();
    $totalDrivers = Driver::count();
    $totalVans = Van::count();

    // Assuming you have an Attendance model with relationships
    // $todaysAttendance = Attendance::with('child')
    //     ->whereDate('created_at', Carbon::today())
    //     ->get();

    return view('dashboard', compact('totalChildren', 'totalDrivers', 'totalVans'));
}
}
