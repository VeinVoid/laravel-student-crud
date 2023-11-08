@extends('layouts.main')
@section('container')
    <p>students</p>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th></th>
          <th>Action</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $key => $student)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $student->NIS }}</td>
              <td>{{ $student->name }}</td>
              <td>{{ $student->kelas }}</td>
              <td><a href="student/{{ $student->id }}"><button type="button" class="btn btn-outline-primary">Detail</button></a></td>
              <td><a href="student/edit/{{ $student->id }}"><button type="button" class="btn btn-outline-warning">Edit</button></a></td>
              <td><a href="student/delete/{{ $student->id }}"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
@endsection