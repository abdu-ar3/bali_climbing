<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\ClassPackage;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'classPackage'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = User::all();
        $classPackages = ClassPackage::all();
        return view('admin.bookings.create', compact('users', 'classPackages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_package_id' => 'required|exists:class_packages,id',
            'booking_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Booking::create($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil ditambahkan.');
    }

    public function edit(Booking $booking)
    {
        $users = User::all();
        $classPackages = ClassPackage::all();
        return view('admin.bookings.edit', compact('booking', 'users', 'classPackages'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_package_id' => 'required|exists:class_packages,id',
            'booking_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking berhasil dihapus.');
    }
}
