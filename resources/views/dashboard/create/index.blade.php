@extends('layouts.admin')
@section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
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
            <form>
                <div class="mb-4">
                    <label class="form-label">Event name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-4">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control">
                </div>
                <div class="mb-4">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-4">
                    <label class="form-label">Location Link</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-4">
                    <label class="form-label">Participant</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <button class="w-full btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
