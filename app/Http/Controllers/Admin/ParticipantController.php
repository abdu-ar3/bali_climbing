<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassPackage;
use App\Models\User;
use App\Models\Booking;  // Menggunakan model Booking untuk relasi peserta dengan kelas
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParticipantController extends Controller
{
    // Menampilkan daftar peserta yang terdaftar
    public function index()
    {
        // Mengambil semua peserta yang terdaftar di kelas
        $participants = Booking::with('user', 'classPackage')->get(); // Mengambil peserta beserta kelas yang mereka ikuti
        return view('admin.participants.index', compact('participants'));
    }

    // Menampilkan form untuk menambah peserta
    public function create()
    {
        $users = User::role('customer')->get();  // Menampilkan semua pengguna dengan peran 'customer'
        $classPackages = ClassPackage::all();   // Menampilkan semua paket kelas
        return view('admin.participants.create', compact('users', 'classPackages'));
    }

    // Menyimpan peserta yang terdaftar di kelas
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // Pastikan user_id ada di tabel users
            'class_package_id' => 'required|exists:class_packages,id', // Pastikan class_package_id ada di tabel class_packages
        ]);

        // Simpan peserta yang terdaftar di kelas
        Booking::create($validated);

        return redirect()->route('admin.participants.index')->with('success', 'Peserta berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit data peserta
    public function edit(Booking $participant)
    {
        // Menampilkan daftar kelas dan pengguna untuk dipilih sebagai peserta
        $users = User::role('customer')->get();
        $classPackages = ClassPackage::all();
        return view('admin.participants.edit', compact('participant', 'users', 'classPackages'));
    }

    // Memperbarui data peserta
    public function update(Request $request, Booking $participant)
    {
        // Validasi data input
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'class_package_id' => 'required|exists:class_packages,id',
        ]);

        // Update data peserta
        $participant->update($validated);

        return redirect()->route('admin.participants.index')->with('success', 'Peserta berhasil diperbarui');
    }

    // Menghapus peserta
    public function destroy(Booking $participant)
    {
        // Menghapus peserta dari kelas
        $participant->delete();
        return redirect()->route('admin.participants.index')->with('success', 'Peserta berhasil dihapus');
    }
}

