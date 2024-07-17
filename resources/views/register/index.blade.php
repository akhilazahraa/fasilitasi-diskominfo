@extends('layouts.main')
@section('container')
    <section class="login-fasilitasi container d-flex min-vh-100 justify-content-center align-items-center">
        <div class="card bg-white p-4" style="width: 400px">
            <div class="text-center">
                <img src="{{ asset('image/logo.png') }}" alt="" height="50px" class="mb-4">
            </div>
            <form class="" action="/login" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <label for="fullname" class="form-label">Full Name</label>
                        @error('fullname')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <input type="fullname" class="form-control border rounded @error('fullname') is-invalid @enderror"
                            id="fullname" name="fullname">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <input type="email" class="form-control border rounded @error('email') is-invalid @enderror"
                            id="email" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control border rounded @error('password') is-invalid @enderror"
                            id="password" name="password">
                    </div>
                    <button type="submit" class="bg-primary text-white fw-semibold p-2 w-100 rounded-pill border-0 mt-2">Register</button>
                </div>
            </form>
        </div>
    </section>