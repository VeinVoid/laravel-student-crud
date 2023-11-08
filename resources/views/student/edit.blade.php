@extends('layouts.main')
@section('container')
    <div class="container">
        <h2>Edit Siswa</h2>
        <form method="POST" action="{{ route('student.update', $student) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="NIS">NIS:</label>
                <input type="text" name="NIS" class="form-control" value="{{ $student->NIS }}">
            </div>

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" value="{{ $student->name }}">
            </div>

            <div class="form-group">
                <label for="tahun_lahir">Tanggal Lahir:</label>
                <input type="date" name="tahun_lahir" class="form-control" value="{{ $student->tanggal_lahir }}">
            </div>

            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" class="form-control" value="{{ $student->kelas }}">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="{{ $student->alamat }}">
            </div>

            <div class="form-group">
                <label for="image">Gambar:</label>
                <textarea name="image" class="form-control" rows="4">{{ $student->image }}</textarea>
            </div>

            <div class="form-group">
                <label for="quotes">Kutipan:</label>
                <textarea name="quotes" class="form-control" rows="4">{{ $student->quotes }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection