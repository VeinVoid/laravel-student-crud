@extends('layouts.main')
@section('container')
    <form class="form-signin m-auto text-center" action="/auth/register" method="POST" style="width: 27%">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Silahkan Register</h1>

        <div class="form-floating mt-4">
            <input name="name" type="text" class="form-control" id="floatingInput" placeholder="Masukkan Nama">
            <label for="name">Nama</label>
        </div>
        <div class="form-floating mt-2">
            <input name="email" type="text" class="form-control" id="floatingInput" placeholder="Masukkan Email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating mt-2">
            <input name="password" type="text" class="form-control" id="floatingPassword" placeholder="Masukkan Password">
            <label for="password">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Sign Up</button>
        <p class="mt-4">Sudah Punya Akun?<span class="text-primary"><a class="text-decoration-none" href="/auth/login?method=GET"> Login</a></span></p>
    </form>
@endsection