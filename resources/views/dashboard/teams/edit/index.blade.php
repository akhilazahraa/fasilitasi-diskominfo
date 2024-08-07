@extends('layouts.admin') @section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Anggota Tim</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="heading mb-4">
        <h1 class="fs-3 fw-bold">Edit Tim</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <form action="{{ route('dashboard.teams.update', $team->id) }}" class="row" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Nama Anggota</label>
                    <input type="text" name="name" class="form-control" value="{{ $team->name }}" required />
                </div>
                <div class="col-lg-12">
                    <button class="w-full btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
