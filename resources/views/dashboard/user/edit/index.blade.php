@extends('layouts.admin') @section('container')
    <div>
        <div class="heading mb-4">
            <h1 class="fs-2">Edit Pengguna</h1>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card border d-flex">
            <div>
                <form action="{{ route('dashboard.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            @error('fullname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" class="form-control border rounded @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ $user->name }}" />
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="email" class="form-control border rounded @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ $user->email }}" />
                        </div>
                        <div class="mb-4">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role">
                                <option value="ADMIN"
                                    {{ $user->role == 'ADMIN' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="USER"
                                    {{ $user->role == 'USER' ? 'selected' : '' }}>User
                                </option>
                            </select>
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
                                id="phonenumber" name="phonenumber" value="{{ $user->phonenumber }}" />
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
                                        id="city" name="city" value="{{ $user->city }}" />
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
                                        id="address" name="address" value="{{ $user->address }}" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary text-white fw-semibold border-0 mt-2">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
