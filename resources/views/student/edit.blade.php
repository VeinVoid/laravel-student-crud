@extends('layouts.main')
@section('container')
    <div class="container">
        <h2>Edit Siswa</h2>
        <form method="POST" action="{{ route('student.update', $student) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="NIS">NIS:</label>
                <input type="text" name="NIS" class="form-control" value="{{ $student->NIS }}" readonly>
            </div>

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" value="{{ $student->name }}" required>
            </div>

            <div class="form-group">
                <label for="tahun_lahir">Tanggal Lahir:</label>
                <input type="date" name="tahun_lahir" class="form-control" value="{{ \Carbon\Carbon::parse($student->tanggal_lahir)->format('Y-m-d') }}" required>

            </div>

            <div class="form-group">
                <label for="id_kelas">Kelas:</label>
                <select class="form-select" name="id_kelas" aria-label="Default select example" required>
                    <option selected disabled>Select Kelas</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $student->id_kelas ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="{{ $student->alamat }}" required>
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