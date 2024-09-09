@extends('layouts.admin')

@section('container')
    <div>
        <div class="heading mb-4">
            <h1 class="fs-2">Pengaturan Akun</h1>
            <p id="currentDateTime" class="text-muted-foreground">
            </p>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card p-2 border d-flex">
            <form action="{{ route('dashboard.setting.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-4">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" class="form-control border rounded @error('name') is-invalid @enderror"
                            id="name" name="name" value="{{ Auth::user()->name }}" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="email" class="form-control border rounded @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ Auth::user()->email }}" />
                    </div>
                    <div class="mb-4">
                        <label for="phonenumber" class="form-label">Nomor Telepon</label>
                        @error('phonenumber')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="text" class="form-control border rounded @error('phonenumber') is-invalid @enderror"
                            id="phonenumber" name="phonenumber" value="{{ Auth::user()->phonenumber }}" />
                    </div>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="city" class="form-label">Kota</label>
                                @error('city')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text"
                                    class="form-control border rounded @error('city') is-invalid @enderror" id="city"
                                    name="city" value="{{ Auth::user()->city }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="address" class="form-label">Alamat</label>
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="text"
                                    class="form-control border rounded @error('address') is-invalid @enderror"
                                    id="address" name="address" value="{{ Auth::user()->address }}" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="w-full btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
