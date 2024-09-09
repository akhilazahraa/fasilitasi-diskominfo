@extends('layouts.admin') @section('container')
    <div class="heading mb-4">
        <h1 class="fs-2">Tambah ISP</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <form action="{{ route('dashboard.isp.store') }}" class="row" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Nama ISP</label>
                    <input type="text" name="name" class="form-control" required />
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button class="w-full btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
