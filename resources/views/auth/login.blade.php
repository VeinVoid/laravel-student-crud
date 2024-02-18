<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/sign-in.css">
    <link rel="stylesheet" href="./css/sidebar.css">
  </head>
  <body class="d-flex">
    <script class="u-script" type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="container mt-4 mx-5" >
        <form class="form-signin m-auto text-center" action="/auth/login" method="POST" style="width: 27%">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>
    
            <div class="form-floating">
                <input name="email" type="text" class="form-control" id="floatingInput" placeholder="Masukkan Email">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mt-2">
                <input name="password" type="text" class="form-control" id="floatingPassword" placeholder="Masukkan Password">
                <label for="password">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign in</button>
            <p class="mt-2">Belum Punya Akun?<span class="text-primary"> <a class="text-decoration-none" href="/auth/register?method=GET">Daftar Sekarang</a></span></p>
        </form>
    </div>
    <script src="./js/sidebar.js"></script>
  </body>
</html>