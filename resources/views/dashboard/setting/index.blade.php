@extends('layouts.admin')
@section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Setting</li>
            </ol>
        </nav>
    </div>
    <div>
        <div class="heading mb-4">
            <h1 class="fs-3 fw-bold">Setting</h1>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card border d-flex">
            <div>
                <img src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp" alt=""
                    class="rounded-circle" width="60px">
            </div>
            <div>
                <form class="" action="/register" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            @error('fullname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" class="form-control border rounded @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ $users->name }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="email" class="form-control border rounded @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ $users->email }}">
                        </div>
                        <div class="mb-4">
                            <label for="phonenumber" class="form-label">Phone Number</label>
                            @error('phonenumber')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text"
                                class="form-control border rounded @error('phonenumber') is-invalid @enderror"
                                id="phonenumber" name="phonenumber" value="{{ $users->phonenumber }}">
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="" class="form-label">City</label>
                                    @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="text"
                                        class="form-control border rounded @error('city') is-invalid @enderror"
                                        id="city" name="city" value="{{ $users->city }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="" class="form-label">Address</label>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="text"
                                        class="form-control border rounded @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ $users->address }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn-primary text-white fw-semibold p-2 w-30 rounded-pill border-0 mt-2"
                            style="width: 200px">Update
                            Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
