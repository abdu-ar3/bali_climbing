@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Feedback untuk Peserta</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   @if ($feedbacks->isEmpty())
        <div class="alert alert-info">Belum ada feedback dari peserta.</div>
    @else
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Peserta</th>
                    <th>Kelas</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $i => $feedback)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $feedback->user->name ?? '-' }}</td>
                        <td>{{ $feedback->classPackage->name ?? '-' }}</td>
                        <td>
                            @for ($x = 1; $x <= 5; $x++)
                                @if ($x <= $feedback->rating)
                                    ⭐
                                @else
                                    ☆
                                @endif
                            @endfor
                        </td>
                        <td>{{ $feedback->feedback }}</td>
                        <td>{{ \Carbon\Carbon::parse($feedback->created_at)->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>
@endsection
