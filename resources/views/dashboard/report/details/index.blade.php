@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
</div>
<div class="heading mb-4">
    <h1 class="fs-3 fw-bold">Detail Laporan</h1>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        <div class="card-body p-2">
            <div>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Nama Akun</span>
                            <p class="text-muted">{{ $report->user->name }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Title</span>
                            <p class="text-muted">{{ $report->title }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Dokumentasi</span>
                            @if($report->documentation)
                            <img
                                src="{{ asset('storage/documentation/' . $report->documentation) }}"
                                alt="Documentation"
                                class="rounded"
                                style="max-height: 300px; height: auto"
                            />
                            @else
                            <p>Tidak ada dokumentasi</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Notes</span>
                            <p class="text-muted">{{ $report->notes }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
