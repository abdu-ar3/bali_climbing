@extends('admin.layout')

@section('content')

<div class="container">

    @role('admin')
    <h1>Dashboard Admin</h1>
    @endrole

    @role('instruktur')
    <h1>Dashboard</h1>
    @endrole
    
<div class="card">
    <div class="d-flex align-items-end row">
        <div class="col-sm-7">
            <div class="card-body">
                          <h5 class="card-title text-primary">Selamat Datang ! 🎉</h5>
                          <p class="mb-4">
                            Kamu bisa <span class="fw-bold">Memantau</span> Dashboard secara real time.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                </div>
                </div>
        </div>
    </div>

    @role('admin')
    <div class="row mt-4">
    <div class="col-md-3">
        <div class="card text-white bg-danger shadow-sm">
            <div class="card-body d-flex align-items-center">
                <i class="bx bx-book-reader bx-lg me-3"></i>
                <div>
                    <h6 class="card-title mb-1">Total Kelas</h6>
                    <h5 class="card-text">{{ $totalClasses }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body d-flex align-items-center">
                <i class="bx bx-group bx-lg me-3"></i>
                <div>
                    <h6 class="card-title mb-1">Total Peserta</h6>
                    <h5 class="card-text">{{$totalPeserta}}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-info shadow-sm">
            <div class="card-body d-flex align-items-center">
                <i class="bx bx-cart bx-lg me-3"></i>
                <div>
                    <h6 class="card-title mb-1">Total Pemesanan</h6>
                    <h5 class="card-text">{{ $totalBookings }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning shadow-sm">
            <div class="card-body d-flex align-items-center">
                <i class="bx bx-time bx-lg me-3"></i>
                <div>
                    <h6 class="card-title mb-1">Pemesanan Pending</h6>
                    <h5 class="card-text">{{ $pendingBookings }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

    @endrole
    </div>

    
@endsection
