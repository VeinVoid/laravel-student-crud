@extends('layouts.main')
@section('container')
    <h2>{{ $student->name }}</h2>
    <h5>{{ $student->tahun_lahir }}</h5>
    <img src="{{ $student->image }}" width="1000px">
    {{ $student->kelas->nama }}
    {{ $student->alamat }}
@endsection