@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Ulasan Kelas: {{ $feedbacks->first()->classPackage->name }}</h1>
    <p><strong>Deskripsi Kelas:</strong> {{ $feedbacks->first()->classPackage->description }}</p>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3>Feedback yang Diberikan</h3>

    @foreach ($feedbacks as $feedback)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Peserta: {{ $feedback->user->name }}</h5>
                <p class="card-text">{{ $feedback->feedback }}</p>
            </div>
        </div>
    @endforeach

    @if($feedbacks->isEmpty())
        <p>Belum ada ulasan untuk kelas ini.</p>
    @endif
</div>
@endsection
