@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Feedback untuk Peserta</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

  

</div>
@endsection
