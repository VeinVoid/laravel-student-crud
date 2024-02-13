@extends('layouts.main')
@section('container')
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
@endsection