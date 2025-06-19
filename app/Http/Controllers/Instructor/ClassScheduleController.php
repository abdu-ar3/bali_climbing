<?php
// app/Http/Controllers/Instructor/ClassScheduleController.php

namespace App\Http\Controllers\Instructor;

use App\Models\ClassPackage;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

class ClassScheduleController extends Controller
{
    public function index()
    {
        // All kelas 
       
    }

    public function myClasses()
    {
        // Ambil jadwal kelas yang diajarkan oleh instruktur yang sedang login
        $user = auth()->user();  // Ambil user yang sedang login
        $jadwal = ClassPackage::where('instructor_id', $user->id)->get();  // Ambil jadwal yang diajarkan oleh instruktur

        // Kirim data ke view
        return view('instruktur.jadwal-saya', compact('jadwal'));
    }

    public function classParticipants($classId)
    {
        // Ambil peserta yang terdaftar pada kelas tertentu
        $classPackage = ClassPackage::findOrFail($classId);
        $participants = $classPackage->participants; // Ambil relasi peserta

        // Cek apakah feedback instruktur sudah ada untuk peserta tertentu
        foreach ($participants as $participant) {
            // Mengambil feedback instruktur berdasarkan user_id dan class_package_id
            $participantFeedback = Feedback::where('user_id', $participant->user_id)
                                        ->where('class_package_id', $classPackage->id)
                                        ->get();

              // Filter feedback instruktur
            $instructorFeedback = $participantFeedback->firstWhere('instructor_feedback', '!=', null);

            // Menyimpan feedback instruktur jika ada
            $participant->instructor_feedback = $instructorFeedback ? $instructorFeedback->instructor_feedback : null;

        }

        return view('instruktur.peserta', compact('classPackage', 'participants'));
    }
}
