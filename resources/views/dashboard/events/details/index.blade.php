@extends('layouts.admin')
@section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
    </div>
    <div class="heading mb-4">
        <h1 class="fs-3 fw-bold">{{ $events->name }}</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <div class="card-body p-2">
                <div>
                    <div class="row">
                        <div class="col-lg-4 mb-4">
                            <div>
                                <span class="text-muted">Event Name</span>
                                <p class="fw-semibold fs-5">{{ $events->name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div>
                                <span class="text-muted">Location</span>
                                <p class="fw-semibold fs-5">{{ $events->location }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div>
                                <span class="text-muted">Start Date</span>
                                <p class="fw-semibold fs-5">{{ $events->start }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div>
                                <span class="text-muted">End Date</span>
                                <p class="fw-semibold fs-5">{{ $events->end }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div>
                                <a href="{{$events->location_link}}">View Maps</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label">Kehadiran</label>
                            <select class="form-select" name="kehadiran">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Tidak Hadir</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Event name</label>
                            <input type="text" name='name' class="form-control" required>
                        </div>
                        <button class="w-full btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
