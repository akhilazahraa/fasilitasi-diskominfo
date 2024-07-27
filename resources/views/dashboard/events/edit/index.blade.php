@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div>
<div class="heading mb-4">
    <h1 class="fs-3 fw-bold">Edit Events</h1>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        <form
            action="{{ route('dashboard.events.update', $event->id) }}"
            method="POST"
            class="row"
            enctype="multipart/form-data"
        >
            @csrf @method('PUT')
            <div class="col-lg-6 mb-4">
                <label class="form-label">Event name</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $event->title) }}"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Location</label>
                <input
                    type="text"
                    name="location"
                    class="form-control"
                    value="{{ old('location', $event->location) }}"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Start</label>
                <input
                    type="datetime-local"
                    name="start"
                    class="form-control"
                    value="{{ old('start', $event->start) }}"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">End</label>
                <input
                    type="datetime-local"
                    name="end"
                    class="form-control"
                    value="{{ old('end', $event->end) }}"
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
            <div class="col-lg-6 mb-4">
                <label class="form-label">Location Link</label>
                <input
                    type="url"
                    name="maps"
                    class="form-control"
                    value="{{ old('maps', $event->maps) }}"
                    required
                />
            </div>
            <div class="mb-4">
                <label class="form-label">Participants</label>
                <select
                    multiple
                    class="form-control"
                    id="user_id"
                    name="user_id[]"
                    required
                >
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ in_array($user->
                        id, $event->users->pluck('id')->toArray()) ? 'selected'
                        : '' }}>
                        {{ $user->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 mb-4">
                <label class="form-label">Notes</label>
                <textarea
                    name="notes"
                    class="form-control"
                    required
                    >{{ old('notes', $event->notes) }}</textarea
                >
            </div>

            <button class="w-full btn btn-primary">Edit</button>
        </form>
    </div>
</div>
@endsection
