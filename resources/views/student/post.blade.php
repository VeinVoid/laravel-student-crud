@extends('layouts.main')
@section('container')
    <div class="container">
        <h2>Tambah Siswa</h2>
        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="NIS">NIS:</label>
                <input type="text" name="NIS" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="tahun_lahir">Tanggal Lahir:</label>
                <input type="date" name="tahun_lahir" class="form-control">
            </div>

            <div class="form-group">
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" class="form-control">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="text" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="quotes">Kutipan:</label>
                <textarea name="quotes" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection