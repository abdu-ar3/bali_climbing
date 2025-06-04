@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Berikan Feedback untuk {{ $booking->user->name }}</h2>
    
        <form action="{{ route('instruktur.feedback.store', $booking->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="feedback">Berikan Feedback</label>
                <textarea name="feedback" id="feedback" class="form-control" rows="5" required>{{ old('feedback') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan Feedback</button>
        </form>


    <a href="{{ route('instruktur.feedback') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
