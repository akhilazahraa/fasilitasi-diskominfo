@extends('layouts.admin')
@section('container')
    <div class="heading mb-4">
        <h1 class="fs-2">Edit Instansi</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <form action="{{ route('opd.update', $opd->id) }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Instansi</label>
                    <input type="text" name="name" class="form-control" value="{{ $opd->name }}" required />
                </div>
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="address" class="form-control" value="{{ $opd->address }}" required />
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button class="w-full btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
