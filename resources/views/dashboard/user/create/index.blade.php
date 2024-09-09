@extends('layouts.admin') @section('container')
<div class="heading mb-4">
    <h1 class="fs-2">Tambah User</h1>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        <form
            action="{{ route('dashboard.user.store') }}"
            class="row"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="col-lg-12 mb-4">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required />
            </div>
            <div class="col-lg-12 mb-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required />
            </div>
            <div class="col-lg-12 mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required />
            </div>
            <div class="col-lg-12 mb-4">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" name="phonenumber" class="form-control" required />
            </div>
            <div class="col-lg-12 d-flex justify-content-end">
                <button class="w-full btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection
