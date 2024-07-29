@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>
<div class="heading mb-4">
    <h1 class="fs-3 fw-bold">Create Events</h1>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        <form
            action="{{ route('events.store') }}"
            class="row"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="col-lg-6 mb-4">
                <label class="form-label">Event name</label>
                <input type="text" name="title" class="form-control" required />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Location</label>
                <input
                    type="text"
                    name="location"
                    class="form-control"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Start</label>
                <input
                    type="datetime-local"
                    name="start"
                    class="form-control"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">End</label>
                <input
                    type="datetime-local"
                    name="end"
                    class="form-control"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Location Link</label>
                <input type="url" name="maps" class="form-control" required />
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
                <label class="form-label">Participants</label>
                <select class="form-select" name="user_id[]" multiple>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 mb-4">
                <label class="form-label">Notes</label>
                <textarea
                    type="file"
                    name="notes"
                    class="form-control"
                    required
                ></textarea>
            </div>
            <div class="col-lg-12">
                <button class="w-full btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection