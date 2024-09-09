@extends('layouts.main') @section('container')
    <section class="auth bg-white d-flex justify-content-center align-items-center row overflow-hidden">
        <div class="col-lg-6 banner-auth-container d-flex flex-column justify-content-center align-items-center bg-primary min-vh-100">
            <img src="{{ asset('image/asset-login.png') }}" alt="" width="500px">
            <div class="text-white text-center">
                <h1 class="fs-3 fw-semibold">Arsip data fasilitasi.</h1>
                <p>Aplikasi ini digunakan untuk arsip data fasilitasi Diskominfo Prov Jawa Tengah.</p>
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
            <div class="auth-container" style="width: 70%">
                <div class="text-center mb-4">
                    {{-- <img src="{{ asset('image/logo.png') }}" alt="" height="50px" class="mb-4" /> --}}
                    <h1 class="fs-3 fw-bold">Masuk</h1>
                </div>
                <form class="" action="/login" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="email" class="form-control border rounded @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="Masukkan email" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control border rounded @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Masukkan password" />
                    </div>
                    <button type="submit" class="btn btn-primary text-white fw-semibold p-2 w-100 border-0 mt-2">
                        Masuk
                    </button>
                </form>
                <div class="text-center mt-4">
                    <p class="text-muted">Silahkan hubungi admin untuk mendapatkan akses login.</p>
                </div>
            </div>
        </div>
    </section>
