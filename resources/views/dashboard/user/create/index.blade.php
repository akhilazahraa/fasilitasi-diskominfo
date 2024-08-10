@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
</div>
<div class="heading mb-4">
    <h1 class="fs-3 fw-bold">Tambah User</h1>
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
            <div class="col-lg-12">
                <button class="w-full btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
