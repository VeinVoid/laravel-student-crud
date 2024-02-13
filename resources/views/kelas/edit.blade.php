@extends('layouts.main')
@section('container')
    <div class="container">
        <h2>Edit Kelas</h2>
        <form method="POST" action="{{ route('kelas.update', $kelas) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="{{ $kelas->nama }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection