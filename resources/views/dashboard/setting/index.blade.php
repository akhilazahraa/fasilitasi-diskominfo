@extends('layouts.admin')
@section('container')

    <div>
        <div class="heading mb-4">
            <h1 class="fs-3 fw-bold">Setting</h1>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card border">
            <form class="" action="/register" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-4">
                        <label for="name" class="form-label">Full Name</label>
                        @error('fullname')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <input type="text" class="form-control border rounded @error('name') is-invalid @enderror"
                            id="name" name="name" value="{{ $users->name }}">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <input type="email" class="form-control border rounded @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ $users->email }}">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
