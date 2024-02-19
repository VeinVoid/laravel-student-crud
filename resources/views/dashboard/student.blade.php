@extends('layouts.main')
@section('container')
  <div>
    <div>
      <h2>Data Students</h2>
      <p class="students-count">{{ $students->count() }} data found</p>
    </div>
    <div class="d-flex justify-content-end align-items-center">
      @guest
        <div class="mb-3 w-25 d-flex">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Student" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
          </div>
        </div>
      @endguest
      @auth
        <div class="mb-3 w-50 d-flex">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Student" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
          </div>
          @if(auth()->user()->role == 'admin')
            <a class="ms-3" style="width: 30%" href="/students/create"><button type="button" class="btn btn-danger">Add Student</button></a>
          @endif
        </div>
      @endauth
    </div>
    <div id="student-list">
      <div class="d-flex justify-content-between align-items-center bg-light rounded" style="height: 45px;">
        <div style="margin-left: 3%; width: 10%">
            <p class="m-0">Id</p>
        </div>
        <div style="width: 15%">
            <p class="m-0">NIS</p>
        </div>
        <div style="width: 20%">
            <p class="m-0">Name</p>
        </div>
        <div style="width: 10%">
            <p class="m-0">Role</p>
        </div>
        <div style="width: 12%">
            <p class="m-0">Action</p>
        </div>
      </div>
      @foreach ($students as $key => $student)
          <div class="d-flex justify-content-between align-items-center border border-secondary rounded student-item" style="height: 45px; margin-top: 1%">
            <div style="margin-left: 3%; width: 10%">
              <p class="m-0">{{ ($students->currentPage() - 1) * $students->perPage() + $key + 1;}}</p>
            </div>
            <div style="width: 15%">
                <p class="m-0">{{ $student->NIS }}</p>
            </div>
            <div style="width: 20%">
                <p class="m-0">{{ $student->name }}</p>
            </div>
            <div style="width: 10%">
                <p class="m-0">{{ $student->role }}</p>
            </div>
            <div class="d-flex" style="width: 12%">
              <a href="" class="btn btn-primary" style="margin-right: 2%">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="margin-bottom: 10%">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
              </a>
              @if (auth()->user()->role != 'student')
                  <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning" style="margin-right: 2%">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16" style="margin-bottom: 10%">
                          <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                      </svg>
                  </a>
                  <form action="{{ route('student.destroy', $student->id) }}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger" style="margin-right: 2%" onclick="return confirm('Are you sure?')">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16" style="margin-bottom: 10%">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                          </svg>
                      </button>
                  </form>     
              @endif   
            </div>
          </div>
      @endforeach
    </div>
    <nav aria-label="Page navigation example" class="mt-4">
      <ul class="pagination justify-content-center">
          <li class="page-item {{ $students->previousPageUrl() ? '' : 'disabled' }}">
              <a class="page-link" href="{{ $students->previousPageUrl() }}" aria-disabled="true">&laquo;</a>
          </li>
          @foreach ($students->getUrlRange(1, $students->lastPage()) as $page => $url)
            <li class="page-item {{ $page == $students->currentPage() ? 'active' : '' }}">
              <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
          @endforeach
          <li class="page-item {{ $students->nextPageUrl() ? '' : 'disabled' }}">
              <a class="page-link" href="{{ $students->nextPageUrl() }}">&raquo;</a>
          </li>
      </ul>
    </nav>  
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
                    console.log(response);

                    var schoolCount = $(response).find('#students-count').text();
                    var schoolListFragment = $(response).find('#student-list');
    
                    $('#student-list').html(schoolListFragment);
                    $('#students-count').text(schoolCount);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
  </script>
@endsection