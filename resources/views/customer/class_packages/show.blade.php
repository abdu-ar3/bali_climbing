@extends('admin.layout')

@section('content')
<div class="container">
    <h1>{{ $classPackage->name }}</h1>
    <p>{{ $classPackage->description }}</p>
    <p><strong>Harga:</strong> Rp. {{ number_format($classPackage->price, 0, ',', '.') }}</p>
    <p><strong>Durasi:</strong> {{ $classPackage->duration }} jam</p>
    <p><strong>Jadwal:</strong> {{ $classPackage->schedule }}</p>

    <h2>Feedback</h2>
    @foreach ($classPackage->feedbacks as $feedback)
        <div>
            <strong>{{ $feedback->user->name }}</strong> (Rating: {{ $feedback->rating }})<br>
            {{ $feedback->feedback }}<br>
            <small>{{ $feedback->created_at->diffForHumans() }}</small>
        </div>
    @endforeach

    @if (Auth::id() !== null && !in_array(Auth::id(), $classPackage->feedbacks->pluck('user_id')->toArray()))
        <a href="{{ route('customer.feedback.create', $classPackage->id) }}" class="btn btn-primary mt-3">
            Berikan Feedback
        </a>
    @endif
</div>
@endsection
