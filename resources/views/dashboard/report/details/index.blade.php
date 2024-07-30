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
    <div class="card p-4 border mb-4">
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
                            <p class="text-muted">Tidak ada dokumentasi</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div>
                            <span class="fw-semibold">Status</span>
                            <div>
                                @if ($report->status == 'on progress')
                                <span class="badge bg-warning text-white"
                                    >On Progress</span
                                >
                                @elseif ($report->status == 'completed')
                                <span class="badge bg-success text-white"
                                    >Completed</span
                                >
                                @elseif ($report->status == 'pending')
                                <span class="badge bg-secondary text-white"
                                    >Pending</span
                                >
                                @elseif ($report->status == 'canceled')
                                <span class="badge bg-danger text-white"
                                    >Canceled</span
                                >
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <span class="fw-semibold">Notes</span>
                            <p class="text-muted">{{ $report->notes }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4 border">
        <div>
            <div class="col-lg-12">
                <form
                    action="{{ route('reports.approve', $report->id) }}"
                    method="POST"
                >
                    @csrf @method('PATCH')
                    <div class="form-group">
                        <div class="d-block">
                            <span class="fw-semibold">Status</span>
                            <p class="text-muted">
                                Pilih untuk mengubah status laporan ini.
                            </p>
                        </div>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $report->
                                status == 'pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="on progress" {{ $report->
                                status == 'on progress' ? 'selected' : '' }}>On
                                Progress
                            </option>
                            <option value="completed" {{ $report->
                                status == 'completed' ? 'selected' : ''
                                }}>Completed
                            </option>
                            <option value="canceled" {{ $report->
                                status == 'canceled' ? 'selected' : ''
                                }}>Canceled
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        Ubah
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
