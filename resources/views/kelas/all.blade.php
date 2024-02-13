@extends('layouts.main')
@section('container')
@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

@if(session('danger'))
  <div class="alert alert-danger">
    {{ session('danger') }}
  </div>
@endif

<div>
  <div style="display:flex; justify-content:space-between">
    <h2>Data Kelas</h2>
  </div>
    <table class="table table-dark table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelas as $key => $kelas)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $kelas->nama }}</td>            
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection