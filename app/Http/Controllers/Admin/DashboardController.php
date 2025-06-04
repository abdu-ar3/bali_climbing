<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassPackage;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClasses = ClassPackage::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalClasses', 'totalBookings', 'pendingBookings'));
    }
}
