<?php
// app/Http/Controllers/Admin/ClassPackageController.php

namespace App\Http\Controllers\Admin;

use App\Models\ClassPackage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassPackageController extends Controller
{
    // Menampilkan daftar paket kelas
    public function index()
    {
        $classPackages = ClassPackage::all();  // Ambil semua kelas
        return view('admin.class-packages.index', compact('classPackages'));
    }

    // Menampilkan form untuk menambah paket kelas
    public function create()
    {
        // Mengambil instruktur yang memiliki role 'instruktur'
        $instructors = User::role('instruktur')->get();  // Menggunakan Spatie's hasRole() method
        return view('admin.class-packages.create', compact('instructors'));
    }

    // Menyimpan data paket kelas baru
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'schedule' => 'required|date',
            'instructor_id' => 'required|exists:users,id', // Validasi instruktur
        ]);

        // Simpan data ke database
        ClassPackage::create($validated);

        return redirect()->route('admin.class-packages.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit paket kelas
    public function edit(ClassPackage $classPackage)
    {
        // Mengambil instruktur yang memiliki role 'instruktur'
        $instructors = User::role('instruktur')->get();
        return view('admin.class-packages.edit', compact('classPackage', 'instructors'));
    }

    // Memperbarui data paket kelas
    public function update(Request $request, ClassPackage $classPackage)
    {
        // Validasi inputan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'required|integer',
            'schedule' => 'required|date',
            'instructor_id' => 'required|exists:users,id', // Validasi instruktur
        ]);

        // Update data kelas
        $classPackage->update($validated);

        return redirect()->route('admin.class-packages.index')->with('success', 'Kelas berhasil diperbarui');
    }

    // Menghapus paket kelas
    public function destroy(ClassPackage $classPackage)
    {
        $classPackage->delete();

        return redirect()->route('admin.class-packages.index')->with('success', 'Kelas berhasil dihapus');
    }
}
