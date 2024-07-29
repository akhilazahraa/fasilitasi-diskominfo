@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Events</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
</div>
<div class="heading mb-4">
    <h1 class="fs-3 fw-bold">Details Event</h1>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        <div class="card-body p-2">
            <div>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Event Name</span>
                            <p class="text-muted">{{ $events->title }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Location</span>
                            <p class="text-muted">
                                {{ $events->location }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Start Date</span>
                            <p class="text-muted">
                                {{ \Carbon\Carbon::parse($events->start)->format('l, d F Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">End Date</span>
                            <p class="text-muted">
                                {{ \Carbon\Carbon::parse($events->end)->format('l, d F Y H:i') }}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Dokumentasi</span>
                            @if($events->documentation)
                            <img
                                src="{{ asset('storage/documentation/' . $events->documentation) }}"
                                alt="Documentation"
                                class="rounded"
                                style="max-width: 100%; height: auto"
                            />
                            @else
                            <p>Tidak ada dokumentasi</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Notes</span>
                            <p class="text-muted">{{ $events->notes }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
