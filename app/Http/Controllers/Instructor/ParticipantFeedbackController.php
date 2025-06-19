<?php

namespace App\Http\Controllers\Instructor;

use App\Models\ClassPackage;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

class ParticipantFeedbackController extends Controller
{

    public function index()
    {
        // Ambil semua feedback lengkap dengan relasi user & class_package
        $feedbacks = Feedback::with(['user', 'classPackage'])
             ->where(function ($query) {
                $query->whereNull('instructor_feedback')->orWhere('instructor_feedback', '');
            })
            ->latest()
            ->get();

        return view('instruktur.feedback.index', compact('feedbacks'));
    }

      // Menampilkan form untuk memberikan feedback
    public function create($bookingId)
    {
        $booking = Booking::findOrFail($bookingId); // Mendapatkan data booking berdasarkan ID

        return view('instruktur.feedback.create', compact('booking')); // Kirim data booking ke view
    }

    public function store(Request $request, $userId, $classPackageId)
    {
        // Validasi input feedback
        $validated = $request->validate([
            'feedback' => 'required|string|max:255',
        ]);

     // Simpan feedback di tabel feedback
        $feedback = new Feedback();
        $feedback->user_id = $userId;  // ID pengguna yang menerima feedback
        $feedback->class_package_id = $classPackageId;  // ID kelas yang diajarkan
        $feedback->instructor_feedback = $request->feedback;
        $feedback->save();

        // Flash success message
        session()->flash('success', 'Feedback berhasil disimpan.');

        // Redirect kembali ke halaman detail peserta
        return redirect()->route('instruktur.peserta', ['classId' => $classPackageId]);
    }

    
}

