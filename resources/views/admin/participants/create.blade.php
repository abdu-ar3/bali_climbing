@extends('admin.layout')

@section('content')
    <h1>Tambah Peserta</h1>

    <form action="{{ route('admin.participants.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="user_id">Peserta</label>
            <select name="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="class_package_id">Pilih Kelas</label>
            <select name="class_package_id" class="form-control" required>
                @foreach ($classPackages as $classPackage)
                    <option value="{{ $classPackage->id }}">{{ $classPackage->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-4">Tambah Peserta</button>
    </form>
@endsection
