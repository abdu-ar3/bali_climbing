<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClassPackage;
use App\Models\ClassParticipant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login'); // pastikan Anda membuat view login.blade.php di folder resources/views/auth
    }

    // Meng-handle login
    public function login(Request $request)
    {
           // Validasi input
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Melakukan login
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->remember)) {
            // Redirect ke halaman home setelah login berhasil
            return redirect()->route('dashboard');
        }

         // Tetap kembali ke login dengan error dan input email
        return redirect()->route('login')
            ->withErrors(['login' => 'Email atau password salah'])
            ->withInput();
    }

    public function home()
    {
        $totalClasses = ClassPackage::count();
        $totalPeserta = ClassParticipant::count();

        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();

        $classPackages = ClassPackage::with('instructor')->get(); // agar bisa ambil nama instruktur juga
        return view('home',  compact('totalClasses', 'totalBookings', 'pendingBookings', 'totalPeserta', 'classPackages'));
    }

    public function dashboard()
    {
        $totalClasses = ClassPackage::count();
        $totalPeserta = ClassParticipant::count();

        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalClasses', 'totalBookings', 'pendingBookings', 'totalPeserta'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
// Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // pastikan ada password_confirmation
        ]);

        // Simpan user baru
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Enkripsi password
        ]);

         // Tambahkan role_id = 3 ke tabel role_user
        DB::table('role_user')->insert([
            'role_id' => 3, // asumsi 3 adalah id untuk role 'Customer' atau setara
            'user_id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Redirect ke dashboard atau halaman tertentu
        return redirect()->route('dashboard');
    }

}
