@extends('layouts.main')
@section('container')
    <div class="container">
        <h2>Tambah Kelas</h2>
        <form method="POST" action="{{ route('kelas.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection