@extends('layouts.admin') @section('container')
    <div class="heading mb-4">
        <h1 class="fs-2">Edit ISP</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <form action="{{ route('dashboard.isp.update', $isp->id) }}" class="row" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Nama ISP</label>
                    <input type="text" name="name" class="form-control" value="{{ $isp->name }}" required />
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button class="w-full btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
