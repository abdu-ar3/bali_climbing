@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Daftar Paket Kelas</h1>
    <div class="row">
        @foreach ($classPackages as $classPackage)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $classPackage->name }}</h5>
                        <p class="card-text">{{ $classPackage->description }}</p>
                        <p><strong>Harga:</strong> Rp. {{ number_format($classPackage->price, 0, ',', '.') }}</p>
                        <p><strong>Durasi:</strong> {{ $classPackage->duration }} jam</p>
                        <p><strong>Jadwal:</strong> {{ $classPackage->schedule }}</p>

                        <form action="{{ route('customer.book') }}" method="POST" onsubmit="return confirm('Anda yakin ingin pesan kelas ini?')">
                            @csrf
                            <input type="hidden" name="class_package_id" value="{{ $classPackage->id }}">
                            <button type="submit" class="btn btn-primary">Pesan Kelas</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
