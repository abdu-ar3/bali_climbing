<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
    <h1>Dashboard Admin</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Kelas</h5>
                    <p class="card-text">{{ $totalClasses }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Peserta</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Pemesanan</h5>
                    <p class="card-text">{{ $totalBookings }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pemesanan Pending</h5>
                    <p class="card-text">{{ $pendingBookings }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
