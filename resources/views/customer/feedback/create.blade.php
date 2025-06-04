@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Berikan Feedback untuk Kelas {{ $classPackage->name }}</h1>

    <form action="{{ route('customer.feedback.store') }}" method="POST">
        @csrf
        <input type="hidden" name="class_package_id" value="{{ $classPackage->id }}">

        <div class="form-group">
            <label for="rating">Rating (1-5)</label>
            <input type="number" id="rating" name="rating" class="form-control" min="1" max="5" required>
        </div>

        <div class="form-group">
            <label for="feedback">Ulasan</label>
            <textarea id="feedback" name="feedback" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Kirim Feedback</button>
    </form>
</div>
@endsection
