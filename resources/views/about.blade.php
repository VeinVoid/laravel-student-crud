@extends('layouts.main')
@section('container')
    <p>About</p>
    <h1>{{ $nama }}</h1>
    <h2>{{ $kelas }}</h2>
    <img src="{{ $image }}" alt="" width="200px">
@endsection