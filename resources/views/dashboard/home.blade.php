@extends('layouts.main')
@section('container')
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <div class="d-flex justify-content-between" style="margin-left:2%; margin-right:2%">
                <div style="width: 15%">
                    <p>School</p>
                    <p>{{ $schoolCount }}</p>
                </div>
                <div style="border-right: 2px solid rgba(0, 0, 0, 0.085); margin-top:1%; margin-bottom:1%"></div>
                <div style="width: 15%">
                    <p>Headmaster</p>
                    <p>{{ $headmasterCount }}</p>
                </div>
                <div style="border-right: 2px solid rgba(0, 0, 0, 0.085); margin-top:1%; margin-bottom:1%"></div>
                <div style="width: 15%">
                    <p>Teacher</p>
                    <p>{{ $teacherCount }}</p>
                </div>
                <div style="border-right: 2px solid rgba(0, 0, 0, 0.085); margin-top:1%; margin-bottom:1%"></div>
                <div style="width: 15%">
                    <p>Student</p>
                    <p>{{ $studentCount }}</p>
                </div>
            </div>
        </div>
        
    </div>
@endsection