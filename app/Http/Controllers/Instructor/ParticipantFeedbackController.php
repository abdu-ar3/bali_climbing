<?php

namespace App\Http\Controllers\Instructor;

use App\Models\ClassPackage;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParticipantFeedbackController extends Controller
{

    public function index()
    {
        // Ambil instruktur yang sedang login
        $instructor = auth()->user()->instructor; 
        
        // Ambil semua kelas yang diajarkan oleh instruktur yang sedang login
        $classPackages = ClassPackage::where('instructor_id', $instructor->id)->get(); 

        // Debugging: Cek data classPackages
        dd($classPackages); // Pastikan data sudah ada
        
        // Ambil data booking berdasarkan kelas yang diajarkan oleh instruktur
        $bookings = Booking::whereIn('class_package_id', $classPackages->pluck('id'))
            ->where('status', 'confirmed')
            ->get();

        return view('instruktur.feedback.index', compact('bookings')); 

        return view('instruktur.feedback.index', compact('bookings')); // Kirim data booking ke view
    }

      // Menampilkan form untuk memberikan feedback
    public function create($bookingId)
    {
        $booking = Booking::findOrFail($bookingId); // Mendapatkan data booking berdasarkan ID

        return view('instruktur.feedback.create', compact('booking')); // Kirim data booking ke view
    }

    // Menyimpan feedback dari instruktur
    public function store(Request $request, $bookingId)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000', // Validasi feedback
        ]);

        $booking = Booking::findOrFail($bookingId);
        $booking->feedback = $request->feedback; // Menyimpan feedback
        $booking->save();

        return redirect()->route('instruktur.feedback')->with('success', 'Feedback berhasil disimpan!');
    }

    
}

