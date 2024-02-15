@extends('layouts.main')
@section('container')
    <div>
        <div>
            <h2>Data Kelas</h2>
            <p id="school-count">{{ $schools->count() }} data found</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-between w-25">
                <p class="text-center mb-3 filter-option" data-type="all" style="cursor: pointer; ">All schools</p>
                <p class="text-center mb-3 filter-option" data-type="negeri" style="cursor: pointer; color: rgb(200, 200, 200);">Negeri</p>
                <p class="text-center mb-3 filter-option" data-type="swasta" style="cursor: pointer; color: rgb(200, 200, 200);">Swasta</p>
            </div>
            @guest
                <div class="mb-3 w-25 d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search School" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                    </div>
                </div>
            @endguest
            @auth
                <div class="mb-3 w-50 d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search School" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                    </div>
                    @if(auth()->user()->role == 'admin')
                        <button type="button" class="btn btn-danger ms-3 w-25">Add School</button>
                    @endif
                </div>
            @endauth
            
        </div>        
        <div id="school-list">
            <div class="d-flex justify-content-between align-items-center bg-light rounded" style="height: 45px;">
                <div style="margin-left: 3%; width: 3%">
                    <p class="m-0">Id</p>
                </div>
                <div style="width: 20%">
                    <p class="m-0">School</p>
                </div>
                <div style="width: 30%">
                    <p class="m-0">Headmaster</p>
                </div>
                <div style="width: 10%">
                    <p class="m-0">Student</p>
                </div>
                <div style="width: 9%">
                    <p class="m-0">Action</p>
                </div>
            </div>              
            @foreach ($schools as $key => $school)
                <div class="d-flex justify-content-between align-items-center border border-secondary rounded school-item" style="height: 45px; margin-top: 1%">
                    <div style="margin-left: 3%; width: 3%">
                        <p class="m-0">{{ $key + 1 }}</p>
                    </div>
                    <div style="width: 20%">
                        <p class="m-0">{{ $school->name }}</p>
                    </div>
                    <div style="width: 30%;">
                        <p class="m-0">{{ $school->headmaster ? $school->headmaster->name : 'Unknown' }}</p>
                    </div>
                    <div style="width: 10%">
                        <p class="m-0">{{ $totalStudents }}</p>
                    </div>
                    <div style="width: 9%">
                        <p class="m-0">Action</p>
                    </div>
                </div>    
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var url = window.location.href;
        $(document).ready(function() {
            $('#button-addon2').click(function() {
                var search = $('.form-control').val();

                if (url.includes('?')) {
                    url += '&search=' + search;
                } else {
                    url += '?search=' + search;
                }

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var schoolCount = $(response).find('#school-count').text();
                        var schoolListFragment = $(response).find('#school-list');
                        $('#school-list').html(schoolListFragment);
                        $('#school-count').text(schoolCount);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            $('.filter-option').click(function() {
                var type = $(this).data('type');
                $('.filter-option').css('color', 'rgb(200, 200, 200)');
                $(this).css('color', 'black');

                if (url.includes('?')) {
                    console.log(url);
                    url += '&type=' + type;
                } else {
                    url += '?type=' + type;
                }

                console.log(url);

                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var schoolCount = $(response).find('#school-count').text();
                        var schoolListFragment = $(response).find('#school-list');
                        $('#school-count').html(schoolCount);
                        $('#school-list').html(schoolListFragment);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection
