<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/sidebar.css">
  </head>
  <body class="d-flex">
    @include('layouts.partial.sidebar')
    <script class="u-script" type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="container mt-4 mx-5" >
        @yield('container')
    </div>
    <script src="/js/sidebar.js"></script>
    <script>
      $(document).ready(function() {
        $('.home-sidebar, .school-sidebar, .teacher-sidebar, .student-sidebar').click(function(e) {
          var url = $(this).find('a').attr('href');
          loadContent(url);
        });
    
        function loadContent(url) {
          $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
              $('#mainContent').html(response);
            },
            error: function(xhr, status, error) {
              console.error('Error:', error);
            }
          });
        }
      });
    </script>
    @yield('scripts')
  </body>
</html>