@extends('layouts.admin') @section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">ISP</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah</li>
            </ol>
        </nav>
    </div>
    <div class="heading mb-4">
        <h1 class="fs-3 fw-bold">Tambah ISP</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <form action="{{ route('dashboard.isp.store') }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Nama ISP</label>
                    <input type="text" name="name" class="form-control" required />
                </div>
                <div class="col-lg-12">
                    <button class="w-full btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
