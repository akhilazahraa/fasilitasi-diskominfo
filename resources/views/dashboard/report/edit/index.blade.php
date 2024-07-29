@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div>
<div class="heading mb-4">
    <h1 class="fs-3 fw-bold">Edit Laporan</h1>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        <form
            action="{{ route('dashboard.report.update', $reports->id) }}"
            method="POST"
            class="row"
            enctype="multipart/form-data"
        >
            @csrf @method('PUT')
            <div class="col-lg-6 mb-4">
                <label class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $reports->title) }}"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label"
                    >Documentation
                    <span class="text-muted"
                        >(Kosongkan jika belum ada.)</span
                    ></label
                >
                <input type="file" name="documentation" class="form-control" />
            </div>
            <div class="col-lg-12 mb-4">
                <label class="form-label">Notes</label>
                <textarea
                    name="notes"
                    class="form-control"
                    required
                    >{{ old('notes', $reports->notes) }}</textarea
                >
            </div>

            <button class="w-full btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection
