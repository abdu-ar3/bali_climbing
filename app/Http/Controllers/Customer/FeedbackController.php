<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ClassPackage;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::with(['user', 'classPackage'])
             ->where(function ($query) {
                $query->whereNull('instructor_feedback')->orWhere('instructor_feedback', '');
            })
            ->latest()
            ->get();

        return view('customer.feedback.index', compact('feedbacks'));
    }
    // Menampilkan form untuk memberikan feedback
    public function create($classPackageId)
    {
        $classPackage = ClassPackage::findOrFail($classPackageId);
        return view('customer.feedback.create', compact('classPackage'));
    }

    // Menyimpan feedback yang diberikan oleh Customer
    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5', // Rating antara 1 hingga 5
            'class_package_id' => 'required|exists:class_packages,id',
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'class_package_id' => $request->class_package_id,
            'feedback' => $request->feedback,
            'rating' => $request->rating,
        ]);
      

        return redirect()->route('customer.bookings.index')->with('success', 'Terima kasih atas feedback Anda!');
    }

    // Di dalam ClassPackageController
    public function show($classPackageId)
    {
        $feedbacks = Feedback::where('class_package_id', $classPackageId)->get();

        // Kirim data feedback ke view
        return view('customer.feedback.show', compact('feedbacks'));
    }

}
