<?php

namespace App\Http\Controllers\Admin;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InstructorController extends Controller
{
    // Menampilkan daftar instruktur
    public function index()
    {
        // Mengambil instruktur yang terdaftar
        $instructors = Instructor::with('user')->get();  // Ambil instruktur beserta data user
        return view('admin.instructors.index', compact('instructors'));
    }

    // Menampilkan form untuk menambah instruktur
    public function create()
    {
        // Mengambil semua user yang memiliki role 'instruktur'
        $users = User::get();
        return view('admin.instructors.create', compact('users'));
    }

    // Menyimpan instruktur baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',  // Validasi user_id
            'bio' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);

        Instructor::create($validated);

        DB::table('role_user')->updateOrInsert(
            [
                'user_id' => $validated['user_id'],
                'role_id' => 2,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        return redirect()->route('admin.instructors.index')->with('success', 'Instruktur berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit instruktur
    public function edit(Instructor $instructor)
    {
        // Mengambil data instruktur untuk diedit
        return view('admin.instructors.edit', compact('instructor'));
    }

    // Memperbarui data instruktur
    public function update(Request $request, Instructor $instructor)
    {
        $validated = $request->validate([
            'bio' => 'nullable|string',
            'contact' => 'nullable|string',
        ]);

        // Update data instruktur
        $instructor->update($validated);

        return redirect()->route('admin.instructors.index')->with('success', 'Instruktur berhasil diperbarui');
    }

    // Menghapus instruktur
    public function destroy(Instructor $instructor)
    {
        $instructor->delete();

        return redirect()->route('admin.instructors.index')->with('success', 'Instruktur berhasil dihapus');
    }
}
