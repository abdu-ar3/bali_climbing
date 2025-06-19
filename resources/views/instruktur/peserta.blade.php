@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Peserta Kelas: {{ $classPackage->name }}</h1>
    <p><strong>Deskripsi:</strong> {{ $classPackage->description }}</p>

     @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nama Peserta</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Kirim Feedback</th>
                <th>Feedback</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->user->name }}</td>
                    <td>{{ $participant->user->email }}</td>
                    <td>{{ $participant->user->phone }}</td>
                    <td>
                      <!-- Form untuk memberi feedback -->
                        <form action="{{ route('instruktur.feedback.store', ['userId' => $participant->user->id, 'classPackageId' => $classPackage->id]) }}" method="POST">
                            @csrf
                            <textarea name="feedback" class="form-control" placeholder="Masukkan feedback"></textarea>
                            <button type="submit" class="btn btn-primary mt-2">Kirim Feedback</button>
                        </form>
                    </td>
                    <td>
                        <!-- Menampilkan feedback instruktur yang sudah diberikan -->
                        @if ($participant->instructor_feedback)
                            <p>{{ $participant->instructor_feedback }}</p>
                        @else
                            <p>No feedback yet.</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
