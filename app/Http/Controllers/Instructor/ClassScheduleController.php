<?php
// app/Http/Controllers/Instructor/ClassScheduleController.php

namespace App\Http\Controllers\Instructor;

use App\Models\ClassPackage;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassScheduleController extends Controller
{
    public function index()
    {
        // Mengambil jadwal kelas yang diajarkan oleh instruktur
        $classes = ClassPackage::where('instructor_id', auth()->user()->id)->get();
        $participants = [];

        foreach ($classes as $class) {
            $participants[$class->id] = $class->participants()->get();
        }

        return view('instruktur.jadwal', compact('classes', 'participants'));
    }
}
