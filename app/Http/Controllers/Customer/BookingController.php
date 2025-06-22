<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ClassPackage;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Menampilkan semua paket kelas yang tersedia untuk Customer
    public function index()
    {
        $classPackages = ClassPackage::all();  // Ambil semua paket kelas
        return view('customer.class_packages.index', compact('classPackages'));
    }

    // Menyimpan pemesanan kelas oleh Customer
    public function store(Request $request)
    {
        $request->validate([
            'class_package_id' => 'required|exists:class_packages,id',
        ]);

        // Simpan pemesanan oleh user yang sedang login
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'class_package_id' => $request->class_package_id,
        ]);

        return redirect()->route('customer.bookings.index')->with('success', 'Kelas berhasil dipesan!');
    }

    // Menampilkan status pemesanan yang telah dilakukan oleh Customer
    public function showBookings()
    {
        $bookings = Booking::where('user_id', Auth::id())->get();
        return view('customer.bookings.index', compact('bookings'));
    }

    public function uploadBukti(Request $request, $id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', Auth::id()) // pastikan hanya user pemilik booking yang bisa upload
            ->firstOrFail();

        if ($booking->bukti_pembayaran) {
            return redirect()->back()->with('error', 'Bukti pembayaran sudah diupload.');
        }

        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        $booking->update(['bukti_pembayaran' => $path]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload!');
    }

}

