@extends('layouts.main') @section('container')
<section
    class="login-fasilitasi d-flex min-vh-100 justify-content-center align-items-center"
>
    <div class="card bg-white p-4" style="width: 400px">
        <div class="text-center">
            <img
                src="{{ asset('image/logo.png') }}"
                alt=""
                height="50px"
                class="mb-4"
            />
        </div>
        <form class="" action="/register" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="form-label">Full Name</label>
                @error('fullname')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <input
                    type="text"
                    class="form-control border rounded @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                />
            </div>
            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                <input
                    type="email"
                    class="form-control border rounded @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                />
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control border rounded @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                />
            </div>
            <button
                type="submit"
                class="btn btn-primary w-100 text-white fw-semibold p-2 border-0 mt-2"
            >
                Register
            </button>
            <div class="form-text text-center pt-2">
                Sudah punya akun?
                <a href="/login" class="text-black">Login sekarang</a>
            </div>
        </form>
    </div>
</section>
