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
    <h2>Data Students</h2>
  </div>
    <table class="table table-dark table-bordered table-striped">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $key => $student)
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ $student->NIS }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->kelas->nama }}</td>            
            </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection