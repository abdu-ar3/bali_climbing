@extends('admin.layout')

@section('content')
    <h1>Edit Peserta</h1>

    <form action="{{ route('admin.participants.update', $participant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_id">Peserta</label>
            <select name="user_id" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $participant->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="class_package_id">Pilih Kelas</label>
            <select name="class_package_id" class="form-control" required>
                @foreach ($classPackages as $classPackage)
                    <option value="{{ $classPackage->id }}" {{ $classPackage->id == $participant->class_package_id ? 'selected' : '' }}>
                        {{ $classPackage->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-4">Update Peserta</button>
    </form>
@endsection
