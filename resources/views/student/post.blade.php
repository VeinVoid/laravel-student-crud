@extends('layouts.main')
@section('container')
    <div class="container">
        <h2>Tambah Siswa</h2>
        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="NIS">NIS:</label>
                <input type="text" name="NIS" class="form-control" value="{{ old('NIS') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="tahun_lahir">Tanggal Lahir:</label>
                <input type="date" name="tahun_lahir" class="form-control" value="{{ old('tahun_lahir') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="id_kelas">Kelas:</label>
                <select class="form-select" name="id_kelas" aria-label="Default select example" required>
                    <option selected>Select Kelas</option>
                    @foreach ($kelas as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="image">Gambar:</label>
                <input type="text" name="image" class="form-control" value="{{ old('image') }}" required>
            </div>

            <div class="form-group mt-3">
                <label for="quotes">Kutipan:</label>
                <textarea name="quotes" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection