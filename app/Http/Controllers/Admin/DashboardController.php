<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassPackage;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassParticipant;

class DashboardController extends Controller
{
    public function index()
    {
        $totalClasses = ClassPackage::count();
        $totalPeserta = ClassParticipant::count();

        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalClasses', 'totalBookings', 'pendingBookings', 'totalPeserta'));
    }

    public function frontend()
    {
        return view('dashboard');
    }
}
